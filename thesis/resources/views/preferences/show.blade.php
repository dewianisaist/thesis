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
<li><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i>  <span>Jadwal Seleksi</span></a></li>
<li><a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i>  <span>Nilai Seleksi</span></a></li>
<li><a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i>  <span>Jadwal Seleksi Pendaftar</span></a></li>
<li class="treeview">
  <a href="{{ route('criterias.index') }}">
    <i class="fa fa-list"></i>
    <span>Kriteria</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('criterias.index') }}"><i class="fa fa-list"></i> Kriteria dari Kajian Pustaka</a></li>
  </ul>
</li>
<li class="active treeview menu-open">
  <a href="{{ route('preferences.index') }}">
    <i class="fa fa-hourglass-half"></i>
    <span>Penilaian</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i> Tipe Preferensi</a></li>
  </ul>
</li>
@endsection
  
@section('content_header')
<h1>
  Detail Tipe Preferensi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i> Tipe Preferensi</a></li>
  <li class="active">Detail Tipe Preferensi</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $preference->name }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kriteria:</strong>
					{{ $preference->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tipe Preferensi:</strong>
					{{ $preference->preference }}
				</div>
			</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kaidah (Maks/Min):</strong>
					{{ $preference->max_min }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter p:</strong>
					{{ $preference->parameter_p }}
				</div>
			</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter q:</strong>
					{{ $preference->parameter_q }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter s:</strong>
					{{ $preference->parameter_s }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection