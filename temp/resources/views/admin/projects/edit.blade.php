@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('admin.projects.index')}}" class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Layihəni yenilə</h5>
            </div>
            <div class="card-body">
                {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id], 'files'=>true ]) !!}
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
                            <hr />
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="category_id">Xidmət</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value=""> -- Seçim edin -- </option>
                                            @foreach($services as $service)
                                                <option {{ $project->category_id == $service->id ? 'selected' : '' }} value="{{$service->id}}">{{$service->title_az}}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('project_date', 'Tarix') !!}
                                        {!! Form::date('project_date', null, ['class' => ($errors->has('project_date')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('project_date') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('client', 'Müştəri adı') !!}
                                        {!! Form::text('client', null, ['class' => ($errors->has('client')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('client') }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        {!! Form::label('youtube', 'Youtube link') !!}
                                        {!! Form::text('youtube', null, ['class' => ($errors->has('youtube')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('youtube') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="pic_box">
                                <div class="row" style="margin: 0px !important;">
                                @foreach($project->photo_photo as $myPhoto)
                                    <div class="myDiv{{ $myPhoto->id }}">
                                        <a  href="{{asset('files/img/projects/'.$myPhoto->file)}}" data-lightbox="myphoto" >
                                            <img src="{{asset('files/img/projects/'.$myPhoto->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" />
                                        </a>
                                        <button type="button" class="btn delete_img" data-id = '{{$myPhoto->id}}' ><i class="far fa-window-close"></i></button>
                                    </div>
                                @endforeach
                                </div>
                                <p class="label_style"> Layihə üçün şəkillər</p>
                                <div class="form-group">
                                    <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control custom-file-input {{($errors->has('filename')) ? 'form-error' : "" }}" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label filelabel" for="file">Faylı seçin</label>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add_input" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>

                                <small class="text-danger">{{ $errors->first('filename') }}</small>
                                <div class="clone hide origin">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="filename[]" class="form-control custom-file-input {{($errors->has('filename')) ? 'form-error' : "" }}" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label filelabel" for="file">Faylı seçin</label>
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger delete_input" type="button"><i class="glyphicon glyphicon-remove"></i> Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pic_box">
                                <div class="row" style="margin: 0px !important;">
                                @foreach($project->photo_doc as $myDoc)
                                    <div class="fileDiv{{ $myDoc->id }} fileDiv" >
                                        <a  href="{{asset('files/img/projects/'.$myDoc->file)}}" donwnload style="margin-bottom: 10px;" target="_blank">
                                            <button type="button" class="btn btn-info btn-rounded" style="width: 90px !important;">Yüklə</button>
                                        </a>
                                        <button type="button" data-id="{{$myDoc->id}}" class="btn custm-btn-delete" ><i class="far fa-trash-alt"></i> Poz</button>
                                    </div>
                                @endforeach
                                </div>
                                <p class="label_style"> Layihə üçün faylar</p>
                                <div class="form-group">
                                    <div class="input-group control-group increment_doc" >
                                        <input type="file" name="documentname[]" class="form-control custom-file-input {{($errors->has('documentname')) ? 'form-error' : "" }}" accept=".xlsx, .xlsm, .xls, .doc, .docx, .txt, .pdf" >
                                        <label class="custom-file-label filelabel" for="file">Faylı seçin</label>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add_input_doc" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">{{ $errors->first('documentname') }}</small>
                                <div class="clone_doc hide origin">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="documentname[]" class="form-control custom-file-input {{($errors->has('documentname')) ? 'form-error' : "" }}" accept=".xlsx, .xlsm, .xls, .doc, .docx, .txt, .pdf" >
                                        <label class="custom-file-label filelabel" for="file">Faylı seçin</label>
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger delete_input_doc" type="button"><i class="glyphicon glyphicon-remove"></i> Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status:') !!}
                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,1, ['class'=>'form-control']) !!}

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
        $(document).ready(function() {

            $(".add_input").click(function(){

                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $(".add_input_doc").click(function(){

                var html = $(".clone_doc").html();
                $(".increment_doc").after(html);
            });

            $(document).on("click",".delete_input_doc",function(){
                if(!$(this).closest('.origin').length > 0){
                    $(this).parents(".control-group").remove();
                }
            });

            $(document).on("click",".delete_input",function(){
                if(!$(this).closest('.origin').length > 0){
                    $(this).parents(".control-group").remove();
                }
            });

        });

        $(document).on('change', '.custom-file-input', function () {
            $(this).next('label').text($(this)[0].files[0].name);
        })

        $('.delete_img').click(function () {
            if (confirm("Silməyə əminsiniz?")) {
                var dataid = $(this).attr('data-id');
                var csrf_token = $('#csrf_token').val();
                console.log(dataid);
                $.ajax({
                    type: 'GET',
                    url: '/deletePicturepicture',
                    data: {dataid: dataid},
                    success: function (data) {
                        $(".myDiv" + dataid).remove();
                    }
                });
            }
        });

        $('.custm-btn-delete').click(function () {
            if (confirm("Silməyə əminsiniz?")) {
                var dataid = $(this).attr('data-id');
                var csrf_token = $('#csrf_token').val();
                console.log(dataid);
                $.ajax({
                    type: 'GET',
                    url: '/deleteFile',
                    data: {dataid: dataid},
                    success: function (data) {
                        $(".fileDiv" + dataid).remove();
                    }
                });
            }
        });
    </script>
@stop
