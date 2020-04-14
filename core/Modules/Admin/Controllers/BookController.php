<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Requests\RequestBook;
use Core\Services\BookServiceContract;
use Illuminate\Http\Request;


class BookController extends Controller
{
    protected $service;

    public function __construct(BookServiceContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $books = $this->service->paginate();
        return view('books.index',compact('books'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('books.create');
    }

    public function store(RequestBook $request)
    {

        $this->service->store($request->all());

        return redirect()->route('books.index')
                        ->with('success','Thêm thành công');
    }

    public function show($id)
    {
        $book = $this->service->find($id);
        return view('books.show',compact('book'));
    }


    public function edit($id)
    {
        $book = $this->service->find($id);
        return view('books.edit',compact('book'));
    }


    public function update(RequestBook $request, $id)
    {

        $this->service->update($id, $request->all());

        return redirect()->route('books.index')
                        ->with('success','Cập nhật thành công');
    }


    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('books.index')
                        ->with('success','Xóa thành công');
    }
}
