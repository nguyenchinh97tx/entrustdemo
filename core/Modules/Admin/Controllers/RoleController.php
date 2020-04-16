<?php

namespace Core\Modules\Admin\Controllers;

use Core\Modules\Admin\Requests\RequestRole;
use Core\Modules\Admin\Requests\UpdateRoleRequest;
use Core\Services\RoleServiceContract;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected $service;

    public function __construct(RoleServiceContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $roles = $this->service->paginate();
        return view('Admin::roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $permission = $this->service->getPermission();
        return view('Admin::roles.create',compact('permission'));
    }

    public function store(RequestRole $request)
    {
        $this->service->store($request);

        return redirect()->route('roles.index')
            ->with('success','Thêm mới thành công');
    }


    public function show($id)
    {
        $data = $this->service->showRole($id);
        return view('Admin::roles.show',$data);
    }


    public function edit($id)
    {
        $data = $this->service->editRole($id);

        return view('Admin::roles.edit',$data);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $this->service->updateRole($id,$request);
        return redirect()->route('roles.index')
            ->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('roles.index')
            ->with('success','Xóa thành công');
    }
}
