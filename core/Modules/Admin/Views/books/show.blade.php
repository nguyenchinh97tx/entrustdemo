@extends('layouts.app')
 
@section('content')


	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 show-page ">
			<div class="">
				<h2 class="">{{ $book->title }}</h2>
			</div>
			<div class="color-date">
				<p class="">{{ $book->created_at }}</p>
			</div>
                <div>
					@if(!$book->image)
						<img class="show-image" src="/images/no-image.jpg" alt="">
					@endif
					@if($book->image)
						<img class="show-image" src="/images/{{$book->image}}" alt="" >
					@endif
				</div>
				<div>
					<p class="">
						{{ $book->content }}
					</p>
				</div>
			<div class="text-center btn-back">
				<a class="btn btn-primary " href="{{ route('books.index') }}"> Quay lại</a>
			</div>


        </div>
	</div>

	</div>

@endsection