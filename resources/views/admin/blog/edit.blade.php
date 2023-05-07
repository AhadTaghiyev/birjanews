@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')


    <div class="col">
        <section class="card">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('admin.blog.index')}}"
                       class="pull-right margin-bottom-20  col-sm-1 btn btn-primary">Geriyə</a>
                </div>
            </div>
            <header class="card-header">
                <h2 class="card-title"> Elanlar </h2>
            </header>
            <div class="card-body">
                {!! Form::model($blog, ['method'=>'PATCH', 'action'=>['AdminBlogController@update', $blog->id], 'files'=>true ]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
                    <section class="toggle">
                        <label>SEO Tools</label>
                        <div class="toggle-content">
                            <div class="form-group">
                                {!! Form::label('seo_title_az', 'SEO Title') !!}
                                {!! Form::text('seo_title_az', $blog->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('seo_keywords_az', 'SEO Keywords') !!}
                                {!! Form::text('seo_keywords_az', $blog->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('seo_desctioption_az', 'SEO Description') !!}
                                {!! Form::text('seo_desctioption_az', $blog->seo_keywords_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="form-group">
                    {!! Form::label('title_az', 'Başlıq AZ:') !!}
                    {!! Form::text('title_az', $blog->title_az, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('title_az') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('short_az', 'Qısa təsvir AZ:') !!}
                    {!! Form::textarea('short_az', $blog->short_az, ['class' => ($errors->has('short_az')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('short_az') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('text_az', 'Metn AZ:') !!}
                    {!! Form::textarea('text_az', $blog->text_az, ['class' => ($errors->has('text_az')) ? 'form-control form-error textarea' : 'form-control textarea']) !!}
                    <small class="text-danger">{{ $errors->first('text_az') }}</small>
                </div>

                <div class="pic_box">
                    <a href="{{asset('files/img/blog/'.$blog->photo->file)}}" data-fancybox="myphoto"><img
                            src="{{asset('files/img/blog/'.$blog->photo->file)}}" height="100px;"
                            style="border: 1px solid black;padding: 5px;"/></a>
                    <p class="label_style"> Blog üçün şəkil seçin</p>
                    <div class="col-sm-12 ">

                        <div class="form-group">
                            <div class="input-group control-group">
                                <input type="file" name="file"
                                       class="form-control custom-file-input {{($errors->has('file')) ? 'form-error' : "" }}"
                                       accept=".png, .jpg, .jpeg">
                            </div>
                            <small class="text-danger">{{ $errors->first('file') }}</small>
                        </div>
                    </div>
                </div>

                <div class="pic_box">
                    <div class="row" style="margin: 0px !important;">
                        @foreach($blog->photo_main as $myPhoto)
                            <div class="myDiv{{ $myPhoto->id }}" style="width: unset;">
                                <a href="{{asset('files/img/blog/'.$myPhoto->file)}}" data-fancybox="myphoto">
                                    <img src="{{asset('files/img/blog/'.$myPhoto->file)}}" height="100px;"
                                         style="border: 1px solid black;padding: 5px;"/>
                                </a>
                                <button type="button" class="btn delete_img" data-id='{{$myPhoto->id}}'><i
                                        class="far fa-window-close"></i></button>
                            </div>
                        @endforeach
                    </div>
                    <p class="label_style"> Layihə üçün şəkillər</p>
                    <div class="form-group">
                        <div class="input-group control-group increment">
                            <input type="file" name="filegallery[]"
                                   class="form-control custom-file-input {{($errors->has('filegallery')) ? 'form-error' : "" }}"
                                   accept=".png, .jpg, .jpeg">

                            <div class="input-group-btn">
                                <button class="btn btn-success add_input" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Əlavə et
                                </button>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger">{{ $errors->first('filegallery') }}</small>
                    <div class="clone hide origin">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filegallery[]"
                                   class="form-control custom-file-input {{($errors->has('filegallery')) ? 'form-error' : "" }}"
                                   accept=".png, .jpg, .jpeg">

                            <div class="input-group-btn">
                                <button class="btn btn-danger delete_input" type="button"><i
                                        class="glyphicon glyphicon-remove"></i> Sil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            {!! Form::label('partner_id', 'Hərrac:') !!}
                            <select class="form-control" name="partner_id">
                                <option value="" selected>--Seçim edin--</option>
                                @foreach($partners as $partner)
                                    <option {{ $blog->partner_id == $partner->id ? 'selected' : '' }} value="{{$partner->id}}">{{$partner->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('created_by') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            {!! Form::label('created_date', 'Tarix') !!}
                            {!! Form::date('created_date', now(), ['class' => ($errors->has('created_date')) ? 'form-control form-error' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('created_date') }}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('tags', 'Taqlar') !!}
                        <div class="form-group">
                            <select name="tags[]" id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="badge badge-primary">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') , $blog->status, ['class'=>'form-control']) !!}

                        </div>
                    </div>
                </div>

                <div class="col-sm-12" style="text-align: right;">
                    <div class="form-group">
                        {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-2']) !!}
                    </div>
                </div>
            </div>
        </section>
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

@stop


@section('scripts')
    <script>
        $(document).ready(function () {

            $(".add_input").click(function () {

                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $(".add_input_doc").click(function () {

                var html = $(".clone_doc").html();
                $(".increment_doc").after(html);
            });

            $(document).on("click", ".delete_input_doc", function () {
                if (!$(this).closest('.origin').length > 0) {
                    $(this).parents(".control-group").remove();
                }
            });

            $(document).on("click", ".delete_input", function () {
                if (!$(this).closest('.origin').length > 0) {
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

    </script>
@stop
