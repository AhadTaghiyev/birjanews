@extends('layouts.admin')

@section('content')
    <div class="col">
        <section class="card">
            <div class="row mb-2">
{{--########################## MODAL FORM CREATE--}}
                <div class="col-sm-12">
                    <a class="mb-1 mt-1 me-1 btn btn-default pull-right" data-bs-toggle="modal"
                       data-bs-target="#SliderCreate" href="#"><i class="fas fa-plus"></i> Yeni</a>
                </div>

                <div class="modal" id="SliderCreate" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Yeni Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            {!! Form::open(['method'=>'POST', 'action'=>['AdminBannerController@store'], 'files'=>true ]) !!}
                            <div class="modal-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <p class="label_style mb-0"> Şəkil</p>
                                        <div class="input-group control-group">
                                            <input type="file" name="file" class="form-control custom-file-input
                                                    {{($errors->has('file')) ? 'form-error' : "" }}"
                                                   accept=".png, .jpg, .jpeg">
                                        </div>
                                        <small class="text-danger">{{ $errors->first('file') }}</small>
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
                {{--#######################END MODAL FORM CREATE--}}
            </div>
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">Banner</h2>
            </header>
            <div class="card-body">

                <table class="table table-bordered table-striped mb-0" id="datatable-default">

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
                    @if($banners)
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>
                                <td>
                                    <a href="{{asset('files/img/banner/'.$banner->photo->file)}}"
                                       data-fancybox="gallery"><img
                                            src="{{asset('files/img/banner/'.$banner->photo->file)}}" height="100px"></a>

                                </td>
                                <td>{{$banner->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$banner->created_at->diffForHumans()}}</td>
                                <td>{{$banner->updated_at->diffForHumans()}}</td>

                                <td style="white-space: nowrap; width: 1%;">

                                    <a class="mb-1 mt-1 me-1 btn btn-default" data-bs-toggle="modal"
                                       style="display: inline-flex;" data-bs-target="#SliderEdit{{$banner->id}}"
                                       href="#"><i class="fas fa-pencil-alt"></i> Dəyiş</a>

                                    <div class="modal" id="SliderEdit{{$banner->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Are you sure?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($banner, ['method'=>'PATCH', 'action'=>['AdminBannerController@update', $banner->id], 'files'=>true ]) !!}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <label>Slayder üçün şəkil seçin</label>
                                                            <div class="image-box-admin">
                                                                <a href="{{asset('files/img/banner/'.$banner->photo->file)}}"
                                                                   data-fancybox="myphoto"><img
                                                                        src="{{asset('files/img/banner/'.$banner->photo->file)}}"
                                                                        style="border: 1px solid black;padding: 5px;width: 300px; height: auto"/></a>

                                                                <div class="form-group">
                                                                    <p class="label_style mb-0"> Şəkil</p>
                                                                    <div class="input-group control-group">
                                                                        <input type="file" name="file" class="form-control custom-file-input
                                                                            {{($errors->has('file')) ? 'form-error' : "" }}"
                                                                               accept=".png, .jpg, .jpeg">
                                                                    </div>
                                                                    <small class="text-danger">{{ $errors->first('file') }}</small>
                                                                </div>
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

                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBannerController@destroy', $banner->id], 'style'=>"display: inline-flex;"]) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Əminsiniz?')"><i class="fas fa-trash-alt"></i>
                                        Sil
                                    </button>
                                    {!! Form::close()!!}

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </section>

    </div>


@stop

@section('scripts')

    @if(session()->has('SliderErrorCreate'))
        <script>
            $('#SliderCreate').modal('show');
        </script>
    @endif

    <script>


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
