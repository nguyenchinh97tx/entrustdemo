@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Roles</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('roles.create') }}"> Thêm mới</a>
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
			<th>Hiển thị</th>
			<th>Mô tả</th>
			<th width="280px"></th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ $role->id }}</td>
		<td>{{ $role->name }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			@permission('role-show')
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Xem</a>
			@endpermission
			@permission('role-edit')
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Sửa</a>
			@endpermission

			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>

	{!! $roles->render() !!}


@endsection