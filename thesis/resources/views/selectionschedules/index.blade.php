@extends('layouts.master_admin')

@section('sidebar_menu')
<li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Data Pengguna</span></a></li>
<li><a href="{{ route('roles.index') }}"><i class="fa fa-key"></i>  <span>Data <dfn>Roles</dfn></span></a></li>
<li class="treeview">
  <a href="{{ route('vocationals.index') }}">
    <i class="fa fa-industry"></i>
    <span>Program</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('vocationals.index') }}"><i class="fa fa-industry"></i> Kejuruan</a></li>
    <li><a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Sub-Kejuruan</a></li>
  </ul>
</li>
<li><a href="{{ route('educations.index') }}"><i class="fa fa-graduation-cap"></i>  <span>Pendidikan</span></a></li>
<li><a href="{{ route('courses.index') }}"><i class="fa fa-university"></i>  <span>Kursus</span></a></li>
<li class="active"><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-check-o"></i>  <span>Jadwal Seleksi</span></a></li>
<li class="treeview">
  <a href="{{ route('preferences.index') }}">
    <i class="fa fa-hourglass-half"></i>
    <span>Penilaian</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Preferensi</span></a></li>
    {{--  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Hasil</a></li>  --}}
  </ul>
</li>
@endsection
  
@section('content_header')
<h1>
  Manajemen Jadwal Seleksi
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Manajemen Jadwal Seleksi</li>
</ol>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					{{--  @permission('selectionschedule-create')  --}}
					<a class="btn btn-success" href="{{ route('selectionschedules.create') }}"> Tambahkan Jadwal Seleksi</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="table_selectionschedules" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Sub-Kejuruan</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Tempat</th>
					<th>Keterangan</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $selectionschedule)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $selectionschedule->subvocational->name }}</td>
						<td>{{ $selectionschedule->date }}</td>
						<td>{{ $selectionschedule->time }}</td>
						<td>{{ $selectionschedule->place }}</td>
						<td>{{ $selectionschedule->information }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('selectionschedules.show',$selectionschedule->id) }}">Detail</a>
							{{--  @permission('selectionschedule-edit')  --}}
							<a class="btn btn-primary" href="{{ route('selectionschedules.edit',$selectionschedule->id) }}">Edit</a>
							{{--  @endpermission  --}}
							{{--  @permission('selectionschedule-delete')  --}}
							{!! Form::open(['method' => 'DELETE','route' => ['selectionschedules.destroy', $selectionschedule->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
							{{--  @endpermission --}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $data->render() !!}
	</div>
</div>	
@endsection