@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Manajemen <dfn>Role</dfn></h2>
	        </div>
	        <div class="pull-right mb-1">
	        	{{--  @permission('role-create')  --}}
	            <a class="btn btn-success" href="{{ route('roles.create') }}"> Buat <dfn>Role</dfn> Baru</a>
	            {{--  @endpermission  --}}
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
			<th>No</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Detail</a>
			{{--  @permission('role-edit')  --}}
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
			{{--  @endpermission  --}}
			{{--  @permission('role-delete')  --}}
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	{{--  @endpermission  --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roles->render() !!}
@endsection