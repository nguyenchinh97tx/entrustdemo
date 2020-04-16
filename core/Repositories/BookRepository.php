<?php

namespace Core\Repositories;

use Core\Modules\Admin\Models\Book;
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

    public function store($request)
    {
        return $this->model->create($request);
    }

    public function update($request, $id)
    {
        $model=$this->find($id);
        return $model->update($request);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }
    public function download($id)
    {
        $book = $this->find($id);
        $name = $book->file;
        return $name;
    }
}