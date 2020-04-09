<?php

namespace Core\Services;

use App\Role;
use Core\Repositories\RoleRepositoryContract;

class RoleService implements RoleServiceContract
{
    protected $repository;

    public function __construct(RoleRepositoryContract $repository)
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

    public function update($id, $data)
    {
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
    public function showRole($id)
    {
        return $this->repository->showRole($id);
    }
    public function editRole($id)
    {
        return $this->repository->editRole($id);
    }
    public function updateRole($id,$request)
    {
        return $this->repository->updateRole($id,$request);
    }
    public function getPermission()
    {
        return $this->repository->getPermission();
    }

}