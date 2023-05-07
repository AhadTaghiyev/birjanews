@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('admin.blog.blog7.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Məqaləni Yenilə</h5>
            </div>
            <div class="card-body">
                {!! Form::model($blog, ['method'=>'PATCH', 'action'=>['AdminBlogSevenController@update', $blog->id], 'files'=>true ]) !!}
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
                                <br/>
                                <a class="btn btn-primary" data-toggle="collapse" href="#seoAZ" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    SEO tools
                                </a>
                                <hr>

                                <div class="collapse" id="seoAZ">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                        {!! Form::text('seo_title_az', $blog->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                        {!! Form::text('seo_keywords_az', $blog->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                        {!! Form::text('seo_desctioption_az', $blog->seo_desctioption_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                                    </div>
                                    <hr/>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('title_az', 'Başlıq AZ:') !!}
                                    {!! Form::text('title_az', $blog->title_az, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_az') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_az', 'Metn AZ:') !!}
                                    {!! Form::textarea('text_az', $blog->text_az, ['class' => ($errors->has('text_az')) ? 'form-control form-error textarea' : 'form-control textarea']) !!}
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
                                        {!! Form::text('seo_title_ru', $blog->seo_title_ru, ['class' => ($errors->has('seo_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_ru', 'SEO Keywords RU:') !!}
                                        {!! Form::text('seo_keywords_ru', $blog->seo_keywords_ru, ['class' => ($errors->has('seo_keywords_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_ru', 'SEO Description RU:') !!}
                                        {!! Form::text('seo_desctioption_ru', $blog->seo_desctioption_ru, ['class' => ($errors->has('seo_desctioption_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_ru') }}</small>
                                    </div>
                                    <hr/>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('title_ru', 'Başlıq RU:') !!}
                                    {!! Form::text('title_ru', $blog->title_ru, ['class' => ($errors->has('title_ru')) ? 'form-control form-error' : ' form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_ru') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_ru', 'Metn RU:') !!}
                                    {!! Form::textarea('text_ru', $blog->text_ru, ['class' => ($errors->has('text_ru')) ? 'form-control form-error textarea' : ' textarea form-control']) !!}
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
                                        {!! Form::text('seo_title_en', $blog->seo_title_en, ['class' => ($errors->has('seo_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_en', 'SEO Keywords EN:') !!}
                                        {!! Form::text('seo_keywords_en', $blog->seo_keywords_en, ['class' => ($errors->has('seo_keywords_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_en', 'SEO Description EN:') !!}
                                        {!! Form::text('seo_desctioption_en', $blog->seo_desctioption_en, ['class' => ($errors->has('seo_desctioption_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_en') }}</small>
                                    </div>
                                    <hr/>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('title_en', 'Başlıq EN:') !!}
                                    {!! Form::text('title_en', $blog->title_en, ['class' => ($errors->has('title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title_en') }}</small>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('text_en', 'Metn EN:') !!}
                                    {!! Form::textarea('text_en', $blog->text_en, ['class' => ($errors->has('text_en')) ? 'form-control form-error textarea' : 'textarea form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('text_en') }}</small>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="image-box-admin">
                                    <a  href="{{asset('files/img/blog/'.$blog->photo->file)}}" data-lightbox="myphoto" ><img src="{{asset('files/img/blog/'.$blog->photo->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
                                    <p style="margin-top: 50px">Məqalə üçün şəkil seçin</p>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label class="custom-file-label" for="file" id="filelabel">Faylı seçin</label>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('file') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('alt_tag', 'ALT Tag:') !!}
                                    {!! Form::text('alt_tag', $blog->photo->alt_tag, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="image-box-admin">
                                    <a  href="{{asset('files/img/blog/'.$blog->photo_main->file)}}" data-lightbox="myphoto" ><img src="{{asset('files/img/blog/'.$blog->photo_main->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
                                    <p style="margin-top: 50px">Blogın içindəki şəkili seçin</p>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main_file_id" name="main_file_id">
                                            <label class="custom-file-label" for="main_file_id" id="main_file_idlabel">Faylı seçin</label>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('main_file_id') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('alt_taginside', 'ALT Tag:') !!}
                                    {!! Form::text('alt_taginside', $blog->photo_main->alt_tag, ['class' => ($errors->has('alt_taginside')) ? 'form-control form-error' : 'form-control']) !!}
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
                                            <option value="{{ $nicks->id }}" {{ $blog->created_by == $nicks->id ? 'selected' : '' }} >{{ $nicks->name_az }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('created_by') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('imgType', 'Şəkil tipi:') !!}
                                    <select class="form-control" name="imgType">
                                        <option value="" selected disabled>--Seçim edin--</option>
                                        <option value="1" {{ $blog->imgType == 1 ? 'selected' : '' }}>Böyük</option>
                                        <option value="2" {{ $blog->imgType == 2 ? 'selected' : '' }}>Orta</option>
                                        <option value="3" {{ $blog->imgType == 3 ? 'selected' : '' }}>Balaca</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('imgType') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('category_id', 'Kateqoriya:') !!}
                                    <select class="form-control" name="category_id">
                                        <option value="" selected disabled>--Seçim edin--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_az }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('created_date', 'Tarix') !!}
                                    {!! Form::date('created_date', date('Y-m-d', strtotime($blog->created_date)), ['class' => ($errors->has('created_date')) ? 'form-control form-error' : 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('created_date') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status:') !!}
                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,$blog->status, ['class'=>'form-control']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12" style="text-align: right;">
                            <div class="form-group">
                                {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-2']) !!}
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
