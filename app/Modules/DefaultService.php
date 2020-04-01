<?php

namespace App\Modules;

use App\Helpers\Responser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;


class DefaultService
{
    /**
     * The fault model of the service
     *
     * e.g.: UsersService will have the default model, User
     *
     * @var Model
     */
    protected $defaultModel;

    const PER_PAGE = 10;

    /**
     * UsersService constructor.
     * @param $defaultModel
     */
    public function __construct(Model $defaultModel)
    {

        $this->defaultModel = $defaultModel;
    }

    /**
     * @param $params
     * @param null $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create($params)
    {
        $columns = Schema::getColumnListing($this->defaultModel->getTable());
        $filteredParams = [];
        foreach ($params as $key => $value) {
            if (in_array($key, $columns) & !in_array($key, $this->defaultModel->getGuarded())) {
                $filteredParams[$key] = $value;
            }
        }
        $params = $filteredParams;

        // Check if a validate method is present on the model supplied in constructor
        if (method_exists($this->defaultModel, 'validate')) {
            $validator = $this->defaultModel::validate($params);
            if (!$validator->passes()) {
                return response([
                    'message' => 'Validation not passed',
                    'errors' => $validator->errors()
                ], 400);
            }
        }

        $this->convertDateStringsToCarbon($params);

        $item = $this->defaultModel
            ->create($params);

        return $item;
    }

    /**
     * Get all items
     *
     * @param $params
     * @param $paginated
     * @param $relationships
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($params, $paginated = true, $relationships = NULL)
    {
        $perPage = isset($params['per_page']) ? $params['per_page'] : self::PER_PAGE;
        $query = $this->defaultModel->whereNotNull('id');

        if ($relationships) {
            $relationships = is_array($relationships) ? $relationships : [$relationships];
            $query = $query->with($relationships);
        }
        $this->attachFilters($params, $query);


        return $paginated === true ? $query->paginate($perPage) : $query->get();
    }

    /**
     * This method has to be override in child controller
     * to filter the database entries from getAll function
     *
     * @param array $rawFilters
     * @param $query
     * @return mixed
     */
    protected function attachFilters(array $rawFilters, $query)
    {

        $columns = Schema::getColumnListing($this->defaultModel->getTable());
        $filteredParams = [];

        foreach ($rawFilters as $key => $value) {
            if (in_array($key, $columns) & !in_array($key, $this->defaultModel->getGuarded())) {
                $filteredParams[$key] = $value;
            }
        }
        if(isset($rawFilters['q'])) {
            $filteredParams['q'] = $rawFilters['q'];
        }
        $rawFilters = $filteredParams;


        foreach ($rawFilters as $key => $value) {
            if($key === 'q') {
                continue;
            }

            if (!$value) {
                $query = $query->whereIsNull($key);
            } else {
                if (property_exists($this->defaultModel, 'searchable') && in_array($key, $this->defaultModel->searchable)) {
                    $query = $query->where($key, 'LIKE', '%' . $value . '%');
                } else {
                    $query = $query->where($key, $value);
                }
            }
        }


        if (isset($rawFilters['q'])) {
            if (property_exists($this->defaultModel, 'searchable')) {

                $query->where(function ($q) use ($rawFilters) {
                    $word = $rawFilters['q'];
                    foreach ($this->defaultModel->searchable as $col) {
                        $q->orWhere($col, 'like', "%$word%");
                    }
                });

            }
        }
        return $query;
    }

    /**
     * This method has to be override in child controller
     * to add filters in every main query of the default
     * CRUD function
     *
     * @param array $rawFilters
     * @param $query
     * @return mixed
     */
    protected function attachGlobalFilters(array $rawFilters, $query)
    {
        return $query;
    }

    /**
     * @param $id
     * @param null $params
     * @param string|array|NULL $relationships
     * @return mixed
     */
    public function getOne($id, $params = NULL, $relationships = NULL)
    {
        $item = $this->defaultModel;

        // attach the global filters to the query
        $item = $this->attachGlobalFilters($params, $item);

        if ($relationships) {
            $relationships = is_array($relationships) ? $relationships : [$relationships];

            $item = $item->with($relationships);
        }
        $item = $item->find($id);
        if (!$item) {
            return Responser::throwErrors(404, 'Can\'t find the specified resource!');
        }

        return $item;
    }

    /**
     * Update the specified item
     *
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id, $params)
    {
        $item = $this->defaultModel;

        // attach the global filters to the query
        $item = $this->attachGlobalFilters($params, $item);

        $item = $item->find($id);
        if (!$item)
            return Responser::throwErrors(404, 'Can\'t find the specified resource!');

        $this->convertDateStringsToCarbon($params);


        $item->update($params);

        return $item;
    }

    /**
     * Delete item
     *
     * @param $id
     * @param $params
     * @return string
     */
    public function delete($id, $params = NULL)
    {

        $item = $this->defaultModel;

        // attach the global filters to the query
        $item = $this->attachGlobalFilters($params, $item);

        $item = $item->find($id);

        if (!$item) {
            return Responser::throwErrors(404, 'Can\'t find the specified resource!');
        }

        $item->delete();

        return "Resource deleted!";
    }

    /**
     * Convert date strings from params to carbon objects
     *
     * @param $params
     */
    protected function convertDateStringsToCarbon(&$params)
    {
        foreach ($params as &$param) {
            if (is_string($param) && strlen($param) >= 10) {
                $expl = explode('/', $param);
                if (count($expl) >= 3) {
                    try {
                        $date = Carbon::parse($param);
                        $param = $date;

                    } catch (\Exception $e) {
                    }
                }
            }
        }
    }

}
