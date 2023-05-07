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
                <h5 class="m-0 font-weight-bold text-white">Partnyoru Yenilə</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::model($partners, ['method'=>'PATCH', 'action'=>['AdminPartnersController@update', $partners->id], 'files'=>true ]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            {!! Form::label('name', 'Şirkət adı:') !!}
                            {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="image-box-admin">
                            @if($partners->file_id != NULL)
                                <a  href="{{asset('files/img/partners/'.$partners->photo->file)}}" data-lightbox="myphoto" ><img src="{{asset('files/img/partners/'.$partners->photo->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
                            @endif
                            <p class="label_style">Logo</p>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file" id="file">Faylı seçin</label>
                                </div>
                                <small class="text-danger">{{ $errors->first('file') }}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link:') !!}
                            {!! Form::text('link', null, ['class' => ($errors->has('link')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('link') }}</small>
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
