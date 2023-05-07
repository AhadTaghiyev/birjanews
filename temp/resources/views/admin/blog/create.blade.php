@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('admin.blog.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Blog Yarat</h5>
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'action'=>['AdminBlogController@store'], 'files'=>true  ]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#about_az">AZ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#about_ru">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#about_en">EN</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="about_az" class="tab-pane active">
                                <br />

                                <a class="btn btn-primary" data-toggle="collapse" href="#seoAZ" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    SEO tools
                                </a>
                                <hr>

                                <div class="collapse" id="seoAZ">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                        {!! Form::text('seo_title_az', null, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                        {!! Form::text('seo_keywords_az', null, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                        {!! Form::text('seo_desctioption_az', null, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                                    </div>
                                    <hr/>

                                </div>

                                <div class="form-group">
                                    {!! Form::label('title_az', 'Başlıq AZ:') !!}
                                    {!! Form::text('title_az', null, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_az') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_az', 'Qısa təsvir  AZ:') !!}
                                    {!! Form::textarea('short_az', null, ['class' => ($errors->has('short_az')) ? 'form-control form-error' : 'form-control', 'rows' => 4]) !!}
                                    <small class="text-danger">{{ $errors->first('short_az') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_az', 'Metn AZ:') !!}
                                    {!! Form::textarea('text_az', null, ['class' => ($errors->has('text_az')) ? 'form-control form-error textarea' : 'form-control textarea']) !!}
                                    <small class="text-danger">{{ $errors->first('text_az') }}</small>
                                </div>
                            </div>
                            <div id="about_ru" class="tab-pane fade">
                                <br/>
                                <a class="btn btn-primary" data-toggle="collapse" href="#seoRU" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    SEO tools
                                </a>
                                <hr>
                                <div class="collapse" id="seoRU">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_ru', 'SEO Title RU:') !!}
                                        {!! Form::text('seo_title_ru', null, ['class' => ($errors->has('seo_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_ru', 'SEO Keywords RU:') !!}
                                        {!! Form::text('seo_keywords_ru', null, ['class' => ($errors->has('seo_keywords_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_ru', 'SEO Description RU:') !!}
                                        {!! Form::text('seo_desctioption_ru', null, ['class' => ($errors->has('seo_desctioption_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_ru') }}</small>
                                    </div>
                                    <hr/>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('title_ru', 'Başlıq RU:') !!}
                                    {!! Form::text('title_ru', null, ['class' => ($errors->has('title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_ru') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_ru', 'Qısa təsvir  RU:') !!}
                                    {!! Form::textarea('short_ru', null, ['class' => ($errors->has('short_ru')) ? 'form-control form-error' : 'form-control', 'rows' => 4]) !!}
                                    <small class="text-danger">{{ $errors->first('short_ru') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_ru', 'Metn RU:') !!}
                                    {!! Form::textarea('text_ru', null, ['class' => ($errors->has('text_ru')) ? 'form-control form-error textarea' : 'form-control textarea']) !!}
                                    <small class="text-danger">{{ $errors->first('text_ru') }}</small>
                                </div>
                            </div>
                            <div id="about_en" class="tab-pane fade">
                                <br/>
                                <a class="btn btn-primary" data-toggle="collapse" href="#seoEN" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    SEO tools
                                </a>
                                <hr>
                                <div class="collapse" id="seoEN">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_en', 'SEO Title EN:') !!}
                                        {!! Form::text('seo_title_en', null, ['class' => ($errors->has('seo_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_en', 'SEO Keywords EN:') !!}
                                        {!! Form::text('seo_keywords_en', null, ['class' => ($errors->has('seo_keywords_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_en', 'SEO Description EN:') !!}
                                        {!! Form::text('seo_desctioption_en', null, ['class' => ($errors->has('seo_desctioption_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_en') }}</small>
                                    </div>
                                    <hr/>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('title_en', 'Başlıq EN:') !!}
                                    {!! Form::text('title_en', null, ['class' => ($errors->has('title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_en') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_en', 'Qısa təsvir  EN:') !!}
                                    {!! Form::textarea('short_en', null, ['class' => ($errors->has('short_en')) ? 'form-control form-error' : 'form-control', 'rows' => 4]) !!}
                                    <small class="text-danger">{{ $errors->first('short_en') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_en', 'Metn EN:') !!}
                                    {!! Form::textarea('text_en', null, ['class' => ($errors->has('text_en')) ? 'form-control form-error textarea' : 'form-control textarea']) !!}
                                    <small class="text-danger">{{ $errors->first('text_en') }}</small>
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
                                    {!! Form::label('alt_tag', 'ALT Tag:') !!}
                                    {!! Form::text('alt_tag', null, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label>Blogın içindəki şəkili seçin</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_file_id" name="main_file_id">
                                        <label class="custom-file-label" for="main_file_id" id="main_file_idlabel">Faylı seçin</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('main_file_id') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('alt_taginside', 'ALT Tag:') !!}
                                    {!! Form::text('alt_taginside', null, ['class' => ($errors->has('alt_taginside')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('alt_taginside') }}</small>
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
                            <div class="col-md-6 col-sm-12">
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
                                {!!  Form::submit('Blog Yarat', ['class'=>'btn btn-primary col-sm-2']) !!}
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
        </div>
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
