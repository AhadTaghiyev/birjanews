@extends('layouts.admin')

@section('content')
    <div class="col-sm-3"> </div>
    <!-- Area Chart -->
    <div class="col-sm-6">


            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-white">İstafadəçi adını yarat</h5>
                </div>

                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>['AdminUsersController@store'], 'files'=>true ]) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('username', 'Username:') !!}
                                {!! Form::text('username', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>

                            <div class="form-group">
                                {!! Form::label('name', 'Tam Ad:') !!}
                                {!! Form::text('name', null,['class'=>'form-control']) !!}
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
                                {!! Form::label('role_id', 'Rol:') !!}
                                {!! Form::select('role_id', $roles,0, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('role_id') }}</small>

                            </div>

                            <div class="form-group">
                                {!! Form::label('is_active', 'Status:') !!}
                                {!! Form::select('is_active',array(1=>'Aktiv', 0 => 'Passiv') ,1, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!  Form::submit('İstifadəçi Yarat', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close()!!}


                </div>
            </div>
    </div>

    <div class="col-sm-2"> </div>


@stop
