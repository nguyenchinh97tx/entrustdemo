@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sửa Book</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('books.index') }}"> Quay lại</a>
	        </div>
	    </div>
	</div>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Có lỗi: </strong><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model($book, ['method' => 'PATCH','route' => ['books.update', $book->id],'enctype'=>'multipart/form-data']) !!}
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tiêu đề:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Tiêu đề','class' => 'form-control')) !!}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nội dung:</strong>
                {!! Form::textarea('content', null, array('placeholder' => 'Nội dung','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Ảnh bìa:</strong>

				{!! Form::file('thumbnail', null, array('class' => 'form-control')) !!}

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>File đính kèm (.doc .pdf ...):</strong>
				{!! Form::file('attachfile', null, array('class' => 'form-control')) !!}
			</div>
		</div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Đồng ý</button>
        </div>

	</div>
	{!! Form::close() !!}
@endsection