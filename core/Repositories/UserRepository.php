<?php

namespace Core\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryContract
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return User::orderBy('id','ASC')
            ->paginate(5);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->model->create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

    }

    public function update($id, $request)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
    }

    public function destroy($id)
    {
        DB::table("users")->where('id',$id)->delete();
    }

    public function listRole()
    {
        return DB::table('roles')->lists('display_name','id');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = DB::table('roles')->lists('display_name','id');
        $userRole = $user->roles->lists('id','id')->toArray();
        $data = [
            'user' => $user,
            'roles'=> $roles,
            'userRole' => $userRole
        ];
        return $data;
    }
}