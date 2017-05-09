<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends AbstractBasicController
{

    protected $permission;
    public $title = '权限管理';


    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    public function fields()
    {
        return [
            'name' => 'bsText',
            'description' => 'bsText',
        ];
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->permission->all();
        return $this->view('common.index', ['list' => $list]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('common.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if ($this->permission->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->permission->find($id);
        return $this->view('common.show', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->permission->find($id);
        return $this->view('common.edit', ['model' => $model]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->permission->find($id);

        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $model = $this->permission->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
