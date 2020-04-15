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
        $book->save();

        if ($data->hasFile('image')) {
            $image = $data->file('image');
            $name = time().$image->getClientOriginalName();
            $path = public_path('/images');
            $image->move($path, $name);
            $book->image = $name;
            $book->save();
        }
        if ($data->hasFile('file')) {
            $image = $data->file('file');
            $name = time().$image->getClientOriginalName();
            $path = storage_path('/files');
            $image->move($path, $name);
            $book->file = $name;
            $book->save();
        }

    }

    public function update($request, $id)
    {
        $book = $this->find($id);
        $book->title = $request->input('title');
        $book->content = $request->input('content');
        $book->save();


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $path = public_path('/images');
            $image->move($path, $name);
            $book->image = $name;
            $book->save();
        }
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time().$image->getClientOriginalName();
            $path = storage_path('/files');
            $image->move($path, $name);
            $book->file = $name;
            $book->save();
        }


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