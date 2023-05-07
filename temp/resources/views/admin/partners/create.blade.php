@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('admin.partners.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Partnyor Əlavə Et</h5>
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'action'=>['AdminPartnersController@store'], 'files'=>true ]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {!! Form::label('name', 'Şirkət adı:') !!}
                    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'Logo:') !!}
                    {!! Form::file('file', ['class' => ($errors->has('file')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('file') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('link', 'Link:') !!}
                    {!! Form::text('link', null, ['class' => ($errors->has('link')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}
                    {!! Form::select('status', ['1'=>'Activ', '2'=>'Deaktiv'] , 1, ['class' => ($errors->has('status')) ? 'form-control form-error' : 'form-control']) !!}
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
        </div>
    </div>
@stop


@section('scripts')
    <script>
        document.querySelector('.custom-file-input').addEventListener('change',function(e){

            document.getElementById('filelabel').innerHTML = null;

            var files = $(this)[0].files;
            if(files.length == 1) {
                var fileName = document.getElementById("file").files[0].name;
            }else if(files.length >1){
                var fileName = files.length + ' fayl';
            }
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName

        })
    </script>
@stop
