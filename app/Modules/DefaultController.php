<?php


namespace App\Modules;


use App\Http\Controllers\Controller;
use App\Modules\Files\Services\FilesService;
use Illuminate\Http\Request;


class DefaultController extends Controller
{
    /**
     * Default service of the controller
     *
     * e.g.: UsersController will have the default service set to UsersService
     *
     * @var FilesService
     */
    protected $defaultService;

    /**
     * Rights to check for in base functions
     *
     * This helps not to override every time the functions
     *
     * @var array
     */
    protected $rightsToCheckFor;

    /**
     * DefaultController constructor.
     * @param $defaultService
     * @param array $rightsToCheckFor
     */
    public function __construct(DefaultService $defaultService, $rightsToCheckFor = [])
    {
        $this->defaultService = $defaultService;
        $this->rightsToCheckFor = $rightsToCheckFor;

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $params = $request->all();

        if (isset($params['relationships'])) {
            $relationships = explode(',', $params['relationships']);
            unset($params['relationships']);
        }

        if (isset($params['paginated'])) {
            $paginated = $params['paginated'];
            unset($params['paginated']);
        }
        return $this->defaultService->getAll($params, $paginated ?? true, $relationships ?? null);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        $params = $request->all();
        if (isset($params['relationships'])) {
            $relationships = explode(',', $params['relationships']);
            unset($params['relationships']);
        }
        return $this->defaultService->getOne($id, $params, $relationships ?? null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->json()->all();
        return $this->defaultService->create($params, $request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $params = $request->json()->all();
        return $this->defaultService->update($id, $params);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function destroy(Request $request, $id)
    {
        $params = $request->all();
        return response()->json($this->defaultService->delete($id, $params));
    }



}