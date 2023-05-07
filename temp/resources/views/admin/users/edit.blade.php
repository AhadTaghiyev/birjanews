@extends('layouts/admin')

@section('content')

    <div class="col-sm-3"> </div>
    <!-- Area Chart -->
    <div class="col-sm-6">

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">İstifadəçilər</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true ]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            {!! Form::label('username', 'Username:') !!}
                            {!! Form::text('username', null, ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Tam ad:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Şifrə:') !!}
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Şifrə təkrar:') !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_active', 'Status:') !!}
                            {!! Form::select('is_active',array(1=>'Active', 0 => 'Not Active') , null, ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('is_active') }}</small>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-12']) !!}
                                </div>
                                {!! Form::close()!!}
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
