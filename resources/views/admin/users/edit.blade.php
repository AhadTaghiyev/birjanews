@extends('layouts/admin')

@section('content')

    <div class="col">
        <section class="card">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{route('admin.users.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
                </div>
            </div>
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">İstifadəçi redaktə: {{ $user->name }}</h2>
            </header>
            <div class="card-body">
                {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true , 'class'=>'form-horizontal form-bordered']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row pb-4">
                    {!! Form::label('username', 'Username:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('username', null, ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('username') }}</small>
                </div>

                <div class="form-group row pb-4">
                    {!! Form::label('email', 'Email:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('username') }}</small>
                </div>

                <div class="form-group row pb-4">
                    {!! Form::label('name', 'Tam ad:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group row pb-4">
                    {!! Form::label('password', 'Şifrə:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                <div class="form-group row pb-4">
                    {!! Form::label('password_confirmation', 'Şifrə təkrar:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                </div>

                <div class="form-group row pb-4">
                    {!! Form::label('is_active', 'Status:', ['class'=>'col-lg-3 control-label text-lg-end pt-2']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('is_active',array(1=>'Active', 0 => 'Not Active') , null, ['class'=>'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('is_active') }}</small>
                </div>
                <div class="row pb-4">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-12']) !!}
                        </div>
                        {!! Form::close()!!}
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </section>
    </div>

@stop
