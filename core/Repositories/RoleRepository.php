<?php

namespace Core\Repositories;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
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
        $data->all();
        $role = new Role();
        $role->name = $data->input('name');
        $role->display_name = $data->input('display_name');
        $role->description = $data->input('description');
        $role->save();
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
    public function showPermission($id)
    {
        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();
        return $rolePermissions;
    }

}