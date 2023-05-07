@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('admin.blog.videoBlog.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">VideoBlog Yarat</h5>
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'action'=>['AdminBlogVideoController@store'], 'files'=>true  ]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('title_az', 'Title AZ:') !!}
                            {!! Form::text('title_az', null, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('title_az') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('title_ru', 'Title RU:') !!}
                            {!! Form::text('title_ru', null, ['class' => ($errors->has('title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('title_ru') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('title_en', 'Title EN:') !!}
                            {!! Form::text('title_en', null, ['class' => ($errors->has('title_en')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('title_en') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label>Blog üçün şəkil seçin</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file" id="filelabel">Faylı seçin</label>
                            </div>
                            <small class="text-danger">{{ $errors->first('file') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('alt_tag', 'Alt Tag:') !!}
                            {!! Form::text('alt_tag', null, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('url', 'URL:') !!}
                            {!! Form::text('url', null, ['class' => ($errors->has('url')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('url') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('created_by', 'Bloq yaradan:') !!}
                            <select class="form-control" name="created_by">
                                <option value="" selected disabled>--Seçim edin--</option>
                                @foreach($usersNicks as $nicks)
                                    <option value="{{ $nicks->id }}">{{ $nicks->name_az }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('created_by') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Kateqoriya:') !!}
                            <select class="form-control" name="category_id">
                                <option value="" selected disabled>--Seçim edin--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_az }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('category_id') }}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('created_date', 'Tarix') !!}
                            {!! Form::date('created_date', null, ['class' => ($errors->has('created_date')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('created_date') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,1, ['class'=>'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="text-align: right;">
                    <div class="form-group">
                        {!!  Form::submit('VideoBlog Yarat', ['class'=>'btn btn-primary col-sm-2']) !!}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close()!!}

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
@stop


@section('scripts')
    <script>
        $(document).on('change', '.custom-file-input', function(e) {
            var fileName = e.target.files[0].name;
            var files = $(this)[0].files;

            if(files.length == 1){
                $(this).next('.custom-file-label').html(fileName);
            }else if(files.length >1){
                $(this).next('.custom-file-label').html(files.length + ' fayl');
            }
        });
    </script>
@stop
