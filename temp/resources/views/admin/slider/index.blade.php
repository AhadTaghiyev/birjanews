@extends('layouts.admin')

@section('content')
    <div class="col-sm-1"></div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Slayder</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal"
                                data-target="#SliderCreate">
                            Şəkil əlavə et
                        </button>
                    </div>


                    <div class="modal fade" id="SliderCreate" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Şəkil əlavə edilməsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {!! Form::open(['method'=>'POST', 'action'=>['AdminSliderController@store'], 'files'=>true ]) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#arbitr_az">AZ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#arbitr_ru">RU</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#arbitr_en">En</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="arbitr_az" class="tab-pane active">
                                            <br/>
                                            <div class="form-group">
                                                {!! Form::label('small_title_az', 'Balaca Başlıq AZ:') !!}
                                                {!! Form::text('small_title_az', null, ['class' => ($errors->has('small_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('small_title_az') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('title_az', 'Başlıq AZ:') !!}
                                                {!! Form::text('title_az', null, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('title_az') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('text_az', 'Metn AZ:') !!}
                                                {!! Form::text('text_az', null, ['class' => ($errors->has('text_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('text_az') }}</small>
                                            </div>
                                        </div>
                                        <div id="arbitr_ru" class="tab-pane fade">
                                            <br/>
                                            <div class="form-group">
                                                {!! Form::label('small_title_ru', 'Balaca Başlıq RU:') !!}
                                                {!! Form::text('small_title_ru', null, ['class' => ($errors->has('small_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('small_title_ru') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('title_ru', 'Başlıq RU:') !!}
                                                {!! Form::text('title_ru', null, ['class' => ($errors->has('title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('title_ru') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('text_ru', 'Metn RU:') !!}
                                                {!! Form::text('text_ru', null, ['class' => ($errors->has('text_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('text_ru') }}</small>
                                            </div>
                                        </div>
                                        <div id="arbitr_en" class="tab-pane fade">
                                            <br/>
                                            <div class="form-group">
                                                {!! Form::label('small_title_en', 'Balaca Başlıq En:') !!}
                                                {!! Form::text('small_title_en', null, ['class' => ($errors->has('small_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('small_title_en') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('title_en', 'Başlıq En:') !!}
                                                {!! Form::text('title_en', null, ['class' => ($errors->has('title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('title_en') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('text_en', 'Metn En:') !!}
                                                {!! Form::text('text_en', null, ['class' => ($errors->has('text_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('text_en') }}</small>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label" for="file" id="filelabel">Faylı
                                                    seçin</label>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('file') }}</small>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('alt_tag', 'Alt Tag:') !!}
                                                {!! Form::text('alt_tag', null, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                                            </div>
                                        </div>
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
                        <th>Status</th>
                        <th>Yradılıb</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($sliders)
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td>
                                    <a href="{{asset('files/img/sl/'.$slider->photo->file)}}" data-lightbox="gallery"><img
                                            src="{{asset('files/img/sl/'.$slider->photo->file)}}" height="100px"></a>

                                </td>
                                <td>{{$slider->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$slider->created_at->diffForHumans()}}</td>
                                <td>{{$slider->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal"
                                                data-target="#SliderEdit{{$slider->id}}">
                                            Redaktə
                                        </button>
                                        <div class="modal fade" id="SliderEdit{{$slider->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Şəkil Redaktə edilməsi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    {!! Form::model($slider, ['method'=>'PATCH', 'action'=>['AdminSliderController@update', $slider->id], 'files'=>true ]) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#slider_az{{$slider->id}}">AZ</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#slider_ru{{$slider->id}}">RU</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#slider_en{{$slider->id}}">EN</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content">
                                                            <div id="slider_az{{$slider->id}}" class="tab-pane active">
                                                                <br/>
                                                                <div class="form-group">
                                                                    {!! Form::label('small_title_az', 'Balaca Başlıq AZ:') !!}
                                                                    {!! Form::text('small_title_az', $slider->small_title_az, ['class' => ($errors->has('small_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('small_title_az') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('title_az', 'Başlıq AZ:') !!}
                                                                    {!! Form::text('title_az', $slider->title_az, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('title_az') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('text_az', 'Metn AZ:') !!}
                                                                    {!! Form::text('text_az', $slider->text_az, ['class' => ($errors->has('text_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('text_az') }}</small>
                                                                </div>
                                                            </div>
                                                            <div id="slider_ru{{$slider->id}}" class="tab-pane fade">
                                                                <br/>
                                                                <div class="form-group">
                                                                    {!! Form::label('small_title_ru', 'Balaca Başlıq RU:') !!}
                                                                    {!! Form::text('small_title_ru', $slider->small_title_ru, ['class' => ($errors->has('small_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('small_title_ru') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('title_ru', 'Başlıq RU:') !!}
                                                                    {!! Form::text('title_ru', $slider->title_ru, ['class' => ($errors->has('title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('title_ru') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('text_ru', 'Metn RU:') !!}
                                                                    {!! Form::text('text_ru', $slider->text_ru, ['class' => ($errors->has('text_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('text_ru') }}</small>
                                                                </div>
                                                            </div>
                                                            <div id="slider_en{{$slider->id}}" class="tab-pane fade">
                                                                <br/>
                                                                <div class="form-group">
                                                                    {!! Form::label('small_title_en', 'Balaca Başlıq EN:') !!}
                                                                    {!! Form::text('small_title_en', $slider->small_title_en, ['class' => ($errors->has('small_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('small_title_en') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('title_en', 'Başlıq EN:') !!}
                                                                    {!! Form::text('title_en', $slider->title_en, ['class' => ($errors->has('title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('title_en') }}</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('text_en', 'Metn EN:') !!}
                                                                    {!! Form::text('text_en', $slider->text_en, ['class' => ($errors->has('text_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('text_en') }}</small>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <label>Slayder üçün şəkil seçin</label>
                                                                <div class="image-box-admin">
                                                                    <a  href="{{asset('files/img/sl/'.$slider->photo->file)}}" data-lightbox="myphoto" ><img src="{{asset('files/img/sl/'.$slider->photo->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
                                                                    <p style="margin-top: 50px">Slayder üçün üzlük şəkil</p>
                                                                    <div class="form-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="file" name="file">
                                                                            <label class="custom-file-label" for="file" id="filelabel">Faylı seçin</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('alt_tag', 'Alt Tag:') !!}
                                                                    {!! Form::text('alt_tag', $slider->photo->alt_tag, ['class' => ($errors->has('alt_tag')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('alt_tag') }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('status', 'Status:') !!}
                                                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,1, ['class'=>'form-control']) !!}
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


                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminSliderController@destroy', $slider->id]]) !!}
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
    @if(session()->has('SliderErrorCreate'))
        <script>
            $('#SliderCreate').modal('show');
        </script>
    @endif

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
    </script>
@stop
