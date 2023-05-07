@extends('layouts.admin')

@section('content')
    <div class="col-sm-1"></div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Qalereya</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-primary" data-toggle="collapse" href="#seo" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            SEO tools
                        </a>
                        <div class="collapse" id="seo">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#seo_az">AZ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#seo_ru">RU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#seo_en">EN</a>
                                </li>
                            </ul>
                            {!! Form::model($gallerySeo, ['method'=>'PATCH', 'action'=>['AdminGallerySeoController@update', $gallerySeo[0]->id] ]) !!}
                            <div class="tab-content">
                                <div id="seo_az" class="tab-pane active">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                        {!! Form::text('seo_title_az', $gallerySeo[0]->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                        {!! Form::text('seo_keywords_az', $gallerySeo[0]->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                        {!! Form::text('seo_desctioption_az', $gallerySeo[0]->seo_desctioption_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                                    </div>
                                </div>
                                <div id="seo_ru" class="tab-pane fade">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_ru', 'SEO Title RU:') !!}
                                        {!! Form::text('seo_title_ru', $gallerySeo[0]->seo_title_ru, ['class' => ($errors->has('seo_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_ru', 'SEO Keywords RU:') !!}
                                        {!! Form::text('seo_keywords_ru', $gallerySeo[0]->seo_keywords_ru, ['class' => ($errors->has('seo_keywords_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_ru', 'SEO Description RU:') !!}
                                        {!! Form::text('seo_desctioption_ru', $gallerySeo[0]->seo_desctioption_ru, ['class' => ($errors->has('seo_desctioption_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_ru') }}</small>
                                    </div>
                                </div>
                                <div id="seo_en" class="tab-pane fade">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_en', 'SEO Title EN:') !!}
                                        {!! Form::text('seo_title_en', $gallerySeo[0]->seo_title_en, ['class' => ($errors->has('seo_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_en', 'SEO Keywords EN:') !!}
                                        {!! Form::text('seo_keywords_en', $gallerySeo[0]->seo_keywords_en, ['class' => ($errors->has('seo_keywords_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_en', 'SEO Description EN:') !!}
                                        {!! Form::text('seo_desctioption_en', $gallerySeo[0]->seo_desctioption_en, ['class' => ($errors->has('seo_desctioption_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_en') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="text-align: right;">
                                <div class="form-group">
                                    {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-2']) !!}
                                </div>
                            </div>
                            {!! Form::close()!!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.gallery.category.index')}}"
                           class="pull-right margin-bottom-20 btn btn-success">
                            Kategoriyalar
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal"
                                data-target="#gallery">
                            Şəkil əlavə et
                        </button>
                    </div>


                    <div class="modal fade" id="gallery" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Şəkil əlavə edilməsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['method'=>'POST', 'action'=>['AdminGalleryController@store'], 'files'=>true ]) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file[]" multiple>
                                                <label class="custom-file-label" for="file" id="filelabel">Faylı seçin</label>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('file') }}</small>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#gallery_az">AZ</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#gallery_ru">RU</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#gallery_en">EN</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div id="gallery_az" class="tab-pane active">
                                                    <div class="form-group">
                                                        {!! Form::label('name_az', 'Ad AZ:') !!}
                                                        {!! Form::text('name_az', null, ['class' => ($errors->has('text_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                        <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                                    </div>
                                                </div>
                                                <div id="gallery_ru" class="tab-pane fade">
                                                    <div class="form-group">
                                                        {!! Form::label('name_ru', 'Ad RU:') !!}
                                                        {!! Form::text('name_ru', null, ['class' => ($errors->has('text_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                        <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                                    </div>
                                                </div>
                                                <div id="gallery_en" class="tab-pane fade">
                                                    <div class="form-group">
                                                        {!! Form::label('name_en', 'Ad EN:') !!}
                                                        {!! Form::text('name_en', null, ['class' => ($errors->has('name_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                        <small class="text-danger">{{ $errors->first('name_en') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="category_id">Kategoriya</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}">{{$category->name_az}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
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
                                                {!! Form::label('status', 'Status:') !!}
                                                {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,1, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Yüklə</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>
                <table id="slidertable" class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Şəkil</th>
                        <th>Kategoriya</th>
                        <th>Status</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($files)
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->id}}</td>
                                <td>
                                    <a href="{{asset('files/img/gallery/'.$file->file)}}" data-lightbox="gallery"><img
                                            src="{{asset('files/img/gallery/'.$file->file)}}" height="100px"></a>

                                </td>
                                <td>{{$file->category_id != NULL ? $file->categoryGallery->name_az : ''}}</td>
                                <td>{{$file->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$file->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal" data-target="#gallery{{$file->id}}">
                                            Redaktə
                                        </button>
                                        <div class="modal fade" id="gallery{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Şəkil əlavə edilməsi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($file, ['method'=>'PATCH', 'action'=>['AdminGalleryController@update', $file->id], 'files'=>true ]) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="image-box-admin">
                                                            @if($file->file != NULL)
                                                                <a  href="{{asset('files/img/gallery/'.$file->file)}}" data-lightbox="myphoto{{$file->id}}" ><img src="{{asset('files/img/gallery/'.$file->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
                                                            @endif
                                                            <p class="label_style">Şəkil</p>
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="file" name="file">
                                                                    <label class="custom-file-label" for="file" id="file">Faylı seçin</label>
                                                                </div>
                                                                <small class="text-danger">{{ $errors->first('file') }}</small>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="tab" href="#gallery_az{{$file->id}}">AZ</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#gallery_ru{{$file->id}}">RU</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#gallery_en{{$file->id}}">EN</a>
                                                                    </li>
                                                                </ul>

                                                                <div class="tab-content">
                                                                    <div id="gallery_az{{$file->id}}" class="tab-pane active">
                                                                        <div class="form-group">
                                                                            {!! Form::label('name_az', 'Ad AZ:') !!}
                                                                            {!! Form::text('name_az', $file->name_az, ['class' => ($errors->has('text_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                                            <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div id="gallery_ru{{$file->id}}" class="tab-pane fade">
                                                                        <div class="form-group">
                                                                            {!! Form::label('name_ru', 'Ad RU:') !!}
                                                                            {!! Form::text('name_ru', $file->name_ru, ['class' => ($errors->has('text_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                                            <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div id="gallery_en{{$file->id}}" class="tab-pane fade">
                                                                        <div class="form-group">
                                                                            {!! Form::label('name_en', 'Ad EN:') !!}
                                                                            {!! Form::text('name_en', $file->name_en, ['class' => ($errors->has('name_en')) ? ' form-control form-error' : '  form-control']) !!}
                                                                            <small class="text-danger">{{ $errors->first('name_en') }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="category_id">Kategoriya</label>
                                                                    <select name="category_id" id="category_id" class="form-control">
                                                                        @foreach($categories as $category)
                                                                            <option {{$file->category_id == $category->id ? 'selected' : ''}}
                                                                                value="{{$category->id}}">{{$category->name_az}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('alt_tag', 'Alt Tag:') !!}
                                                                    {!! Form::text('alt_tag', $file->alt_tag, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('status', 'Status:') !!}
                                                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,$file->status, ['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Yenilə</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminGalleryController@destroy', $file->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Əminsiniz?')"><i class="fas fa-trash-alt"></i>
                                            Sil
                                        </button>
                                        {!! Form::close()!!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#slidertable').DataTable({
                "order": [[ 0, "desc" ]]
            });
        });

        document.querySelector('.custom-file-input').addEventListener('change', function (e) {

            document.getElementById('filelabel').innerHTML = null;

            var files = $(this)[0].files;
            if (files.length == 1) {
                var fileName = document.getElementById("file").files[0].name;
            } else if (files.length > 1) {
                var fileName = files.length + ' fayl';
            }
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName

        })

        @if(session()->has('errorOnStore'))
            $('#gallery').modal('show');
        @endif
    </script>


@stop
