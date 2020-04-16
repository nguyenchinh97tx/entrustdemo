<?php

namespace Core\Repositories;

use Core\Modules\Admin\Models\Role;
use Core\Modules\Admin\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleRepository implements RoleRepositoryContract
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return DB::table('roles')
            ->orderBy('id','ASC')
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        $this->model->create($data->all());
        $role = Role::orderBy('id', 'DESC')->first();
        foreach ($data->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {

        DB::table("roles")->where('id',$id)->delete();

    }

    public function show($id)
    {
        $role = $this->find($id);
        return $role;
    }

    public function showRole($id)
    {
        $role=$this->find($id);
        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();
        $data = [
            'role'=>$role,
            'rolePermissions' => $rolePermissions
        ];
        return $data;
    }

    public function editRole($id)
    {
        $role = $this->find($id);
        $permission = DB::table('permissions')->get();
        $rolePermissions = DB::table("permission_role")
            ->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');
        $data = [
            'role'=>$role,
            'permission'=>$permission,
            'rolePermissions'=>$rolePermissions
        ];
        return $data;

    }

    public function updateRole($id,$request)
    {
        $model = $this->model;
        $model->update($request->all());
        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();
        $role = Role::orderBy('id', 'DESC')->first();
        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }
    }

    public function getPermission()
    {
       return DB::table('permissions')->get();
    }
}