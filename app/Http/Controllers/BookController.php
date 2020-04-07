<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\RequestBook;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:book-list', ['only' => [
            'index',
        ]]);
        $this->middleware('permission:book-show', ['only' => [
            'show',
        ]]);

        $this->middleware('permission:book-create', ['only' => [
            'create',
        ]]);
        $this->middleware('permission:book-edit', ['only' => [
            'edit',
        ]]);
        $this->middleware('permission:book-delete', ['only' => [
            'destroy',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::orderBy('id','DESC')->paginate(5);
        return view('books.index',compact('books'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBook $request)
    {

        Book::create($request->all());

        return redirect()->route('books.index')
                        ->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestBook $request, $id)
    {

        Book::find($id)->update($request->all());

        return redirect()->route('books.index')
                        ->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('books.index')
                        ->with('success','Xóa thành công');
    }
}
