@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Books</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('book-create')
	            <a class="btn btn-success" href="{{ route('books.create') }}"> Thêm mới</a>
	            @endpermission
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<table class="table table-bordered">
		<tr>
			<th>STT</th>
			<th>Tiêu đề</th>
			<th>Nội dung</th>
			<th width="280px"></th>
		</tr>
	@foreach ($books as $key => $book)
	<tr>
		<td>{{ $book->id }}</td>
		<td>{{ $book->title }}</td>
		<td>{{ $book->content }}</td>
		<td>
			@permission('book-show')
			<a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Xem</a>
			@endpermission
			@permission('book-edit')
			<a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Sửa</a>
			@endpermission

			@permission('book-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['books.destroy', $book->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>

	{!! $books->render() !!}


@endsection