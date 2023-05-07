@extends('layouts.admin')

@section('content')
    <div class="col-sm-1"></div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Instagram</h5>
            </div>
            <div class="card-body">
                <div class="row">
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
                                {!! Form::open(['method'=>'POST', 'action'=>['AdminInstagramController@store'], 'files'=>true ]) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label" for="file" id="filelabel">Faylı seçin</label>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('file') }}</small>
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
                                    <a href="{{asset('files/img/insta/'.$file->photo->file)}}" data-lightbox="gallery"><img
                                            src="{{asset('files/img/insta/'.$file->photo->file)}}" height="100px"></a>

                                </td>
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
                                                    {!! Form::model($file, ['method'=>'PATCH', 'action'=>['AdminInstagramController@update', $file->id], 'files'=>true ]) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="image-box-admin">
                                                            @if($file->photo->file != NULL)
                                                                <a  href="{{asset('files/img/insta/'.$file->photo->file)}}" data-lightbox="myphoto{{$file->id}}" ><img src="{{asset('files/img/insta/'.$file->photo->file)}}" height="100px;" style="border: 1px solid black;padding: 5px;" /></a>
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

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminInstagramController@destroy', $file->id]]) !!}
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


        $(document).on('change', '.custom-file-input', function(e) {
            var fileName = e.target.files[0].name;
            var files = $(this)[0].files;

            if(files.length == 1){
                $(this).next('.custom-file-label').html(fileName);
            }else if(files.length >1){
                $(this).next('.custom-file-label').html(files.length + ' fayl');
            }
        });

        @if(session()->has('errorOnStore'))
            $('#gallery').modal('show');
        @endif
    </script>


@stop
