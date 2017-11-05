@extends('layouts.master_registrant')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection

@section('sidebar_menu')
<li class="active treeview menu-open">
  <a href="{{ route('registrants.index') }}">
    <i class="fa fa-user"></i>
    <span>Profil</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{ route('registrants.index') }}"><i class="fa fa-user"></i> Data Diri</a></li>
    {{--  <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
	<li><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>  --}}
  </ul>
</li>
@endsection
 
@section('content_header')
<h1>
  Edit Data Diri
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('registrants.index') }}"><i class="fa fa-users"></i> Data Diri</a></li>
  <li class="active">Edit Data Diri</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
	    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Maaf!</strong> Ada kesalahan dengan data yang Anda masukkan.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
	    @endif
        {!! Form::model($registrant, ['method' => 'PATCH','route' => ['registrants.update', $registrant->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No. Identitas:</strong>
                        {!! Form::text('identity_number', null, array('placeholder' => 'No. Identitas berupa NIK','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Alamat:</strong>
						{!! Form::textarea('address', null, array('placeholder' => 'Alamat','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No. Telepon:</strong>
                        {!! Form::text('phone_number', null, array('placeholder' => 'No. Telepon','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
                        <strong>Jenis Kelamin:</strong>
						{!! Form::select('gender', $registrant, [], array('class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tempat, Tanggal Lahir:</strong>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4">
                                {!! Form::text('place_birth', null, array('placeholder' => 'Tempat Lahir','class' => 'form-control')) !!}
                            </div>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::text('date_birth', null, array('placeholder' => 'Tanggal Lahir','class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Anak ke-:</strong>
                        {!! Form::text('order_child', null, array('placeholder' => 'Anak ke-','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Saudara:</strong>
                        {!! Form::text('amount_sibling', null, array('placeholder' => 'Jumlah Saudara','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Agama:</strong>
                        {!! Form::text('religion', null, array('placeholder' => 'Agama','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Ibu Kandung:</strong>
                        {!! Form::text('biological_mother_name', null, array('placeholder' => 'Nama Ibu Kandung','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Ayah:</strong>
                        {!! Form::text('father_name', null, array('placeholder' => 'Nama Ayah','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Alamat Orangtua:</strong>
						{!! Form::textarea('parent_address', null, array('placeholder' => 'Alamat Orangtua','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Pas Foto:</strong>
						 {!! Form::file('photo', null, array('class' => 'custom-file-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>KTP:</strong>
						 {!! Form::file('ktp', null, array('class' => 'custom-file-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Ijazah Terakhir:</strong>
						 {!! Form::file('last_certificate', null, array('class' => 'custom-file-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$('#datepicker').datetimepicker({
		format: 'YYYY-MM-DD'
	});
</script>
@endsection