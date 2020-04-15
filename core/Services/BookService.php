<?php

namespace Core\Services;

use Core\Repositories\BookRepositoryContract;

class BookService implements BookServiceContract
{
    protected $repository;

    public function __construct(BookRepositoryContract $repository)
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

    public function update($request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
    public function show($id)
    {
        return $this->repository->show($id);
    }
    public function download($id)
    {
        return $this->repository->download($id);
    }
}