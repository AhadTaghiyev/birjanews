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
                <h2 class="card-title">Hərrac Təşkilatın redaktəsi: {{ $partners->name }}</h2>
            </header>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::model($partners, ['method'=>'PATCH', 'action'=>['AdminPartnersController@update', $partners->id], 'files'=>true, 'class'=>'form-horizontal form-bordered']) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            {!! Form::label('name', 'Təşkilatın adı:') !!}
                            {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="image-box-admin">
                            @if($partners->file_id != NULL)
                                <a href="{{asset('files/img/partners/'.$partners->photo->file)}}" data-fancybox="myphoto"><img
                                        src="{{asset('files/img/partners/'.$partners->photo->file)}}" height="100px;"
                                        style="border: 1px solid black;padding: 5px;"/></a>
                            @endif
                            <div class="form-group">
                                {!! Form::label('file', 'Logo:') !!}
                                {!! Form::file('file', ['class' => ($errors->has('file')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('file') }}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status', ['1'=>'Activ', '2'=>'Deaktiv'], $partners->status , ['class' => ($errors->has('status')) ? 'form-control form-error' : 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-3 pull-right']) !!}
                        </div>
                        {!! Form::close() !!}

                        <div class="col-sm-2"></div>
                    </div>
                </div>

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
