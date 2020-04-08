<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestBook;
use App\Http\Requests\RequestRole;
use App\Http\Requests\UpdateRoleRequest;
use Core\Services\BookServiceContract;
use Core\Services\RoleServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

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
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    public function store(RequestRole $request)
    {
        $this->service->store($request);

        return redirect()->route('roles.index')
            ->with('success','Thêm mới thành công');
    }


    public function show($id)
    {
        $role=$this->service->find($id);
        $rolePermissions = $this->service->showPermission($id);
        $data = [
            'role'=>$role,
            'rolePermissions'=>$rolePermissions
        ];

        return view('roles.show',$data);
    }


    public function edit($id)
    {
        $role = $this->service->find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }


    public function update(UpdateRoleRequest $request, $id)
    {

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

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
