@extends('layouts.admin')

@section('content')
    <div class="col">
        <section class="card">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{route('admin.partners.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
                </div>
            </div>
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">Yeni Hərrac Təşkilatı</h2>
            </header>
            <div class="card-body">

                {!! Form::open(['method'=>'POST', 'action'=>['AdminPartnersController@store'], 'files'=>true, 'class'=>'form-horizontal form-bordered']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {!! Form::label('name', 'Təşkilatın adı:') !!}
                    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'Logo:') !!}
                    {!! Form::file('file', ['class' => ($errors->has('file')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('file') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}
                    {!! Form::select('status', ['1'=>'Aktiv', '2'=>'Pasiv'] , 1, ['class' => ($errors->has('status')) ? 'form-control form-error' : 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Əlavə et', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                @if($errors->any())
                    <div class="row">
                        <div class="alert alert-danger col-sm-12">
                            <p><strong>Səhvlik var! Zəhmət olmasa aşağıdaki səvfləri düzəldin</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@stop
