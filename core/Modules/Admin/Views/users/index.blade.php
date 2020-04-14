@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users</h2>
	        </div>
	        <div class="pull-right">
				@permission('user-create')
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Thêm mới</a>
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
			<th>Tên</th>
			<th>Email</th>
			<th>Vai Trò</th>
			<th width="280px"></th>
		</tr>
	@foreach ($users as $key => $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $value)
					<label class="label label-success">{{ $value->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Xem</a>
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Sửa</a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>

	{!! $users->render() !!}


@endsection