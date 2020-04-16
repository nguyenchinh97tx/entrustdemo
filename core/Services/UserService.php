<?php

namespace Core\Services;

use Core\Repositories\UserRepositoryContract;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceContract
{
    protected $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }


    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {

        return $this->repository->store($data);
    }

    public function update($id, $request)
    {
        $data=$this->checkPass($request);
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
    public function show($id)
    {
       return $this->repository->show($id);
    }

    public function editUser($id)
    {
        return $this->repository->editUser($id);
    }

    public function listRole()
    {
        return $this->repository->listRole();
    }
    public function checkPass($request)
    {
        $input = $request;
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
           return $input;
        }
        else{
            $input = array_except($input,array('password'));
            return $input;
        }

    }
}