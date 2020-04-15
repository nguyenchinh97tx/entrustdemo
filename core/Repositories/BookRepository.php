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

        $book = new Book();
        $book->title = $data->input('title');
        $book->content = $data->input('content');

        if ($data->hasFile('image')) {
            $image = $data->file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $book->image = $name;
            $book->save();
        }
        if ($data->hasFile('file')) {
            $image = $data->file('file');
            $name = time().$image->getClientOriginalName();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $book->file = $name;
            $book->save();
        }

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