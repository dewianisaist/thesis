@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Detail Kejuruan</h2>
	        </div>
	        <div class="pull-right mb-1">
	            <a class="btn btn-primary" href="{{ route('vocationals.index') }}"> Kembali</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $vocational->name }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                {{ $vocational->description }}
            </div>
        </div>
	</div>
@endsection