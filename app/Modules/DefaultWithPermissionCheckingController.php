<?php


namespace App\Modules;


use App\Helpers\Responser;
use Illuminate\Http\Request;


class DefaultWithPermissionCheckingController extends DefaultController
{
    public function __construct(DefaultService $defaultService, array $rightsToCheckFor = [])
    {
        parent::__construct($defaultService, $rightsToCheckFor);
    }

    public function index(Request $request)
    {

        if (!($permissionErrors = $this->hasPermissions('index', $request))) {
            return $permissionErrors;
        }
        return parent::index($request);
    }

    public function show(Request $request, $id)
    {
        if (!($permissionErrors = $this->hasPermissions('show', $request))) {
            return $permissionErrors;
        }
        return parent::show($request, $id);
    }

    public function store(Request $request)
    {
        if (!($permissionErrors = $this->hasPermissions('store', $request))) {
            return $permissionErrors;
        }

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        if (!($permissionErrors = $this->hasPermissions('update', $request))) {
            return $permissionErrors;
        }

        return parent::update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        if (!($permissionErrors = $this->hasPermissions('destroy', $request))) {
            return $permissionErrors;
        }
        return parent::destroy($request, $id);
    }

    /**
     * Function that is called before doing actions to check
     * for some permissions based on params and function name
     *
     * The body of the function is an example.
     *
     * @param $functionName
     * @param Request $request
     * @return bool|mixed
     */
    protected function hasPermissions($functionName, Request $request)
    {
        $errors = [];

        return count($errors) > 0 ? Responser::throwErrors(403, $errors) : true;
    }

}