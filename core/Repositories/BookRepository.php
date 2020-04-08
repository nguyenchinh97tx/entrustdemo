<?php

namespace Core\Repositories;

use App\Book;
use Illuminate\Support\Facades\DB;

class BookRepository implements BookRepositoryContract
{
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return DB::table('books')
            ->orderBy('id','ASC')
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }


}