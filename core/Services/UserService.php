<?php

namespace Core\Services;

use Core\Repositories\UserRepositoryContract;

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
        return $this->repository->update($id, $request);
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

}