@extends('layouts.admin')

@section('content')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Müəlliflər</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{route('admin.blog.index')}}" class="pull-right margin-bottom-20 margin-right-5 btn btn-success">
                            Blog
                        </a>
                        <a href="{{route('admin.blog.videoBlog.index')}}" class="pull-right margin-bottom-20 margin-right-5 btn btn-success">
                            Video Blog
                        </a>
                        <a href="{{route('admin.blog.blog7.index')}}" class="pull-right margin-bottom-20 margin-right-5 btn btn-success">
                            Blog 7
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal" data-target="#authors">
                            Müəllif əlavə et
                        </button>
                    </div>


                    <div class="modal fade" id="authors" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Müəllif əlavə edilməsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['method'=>'POST', 'action'=>['AdminAuthorController@store'] , 'files'=>true]) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('name_az', 'Müəllifin adı AZ:') !!}
                                                {!! Form::text('name_az', null, ['class' => ($errors->has('name_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('name_ru', 'Müəllifin adı RU:') !!}
                                                {!! Form::text('name_ru', null, ['class' => ($errors->has('name_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('name_en', 'Müəllifin adı EN:') !!}
                                                {!! Form::text('name_en', null, ['class' => ($errors->has('name_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_en') }}</small>
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
                                    <div class="col-sm-12" style="text-align: right;">
                                        <div class="form-group">
                                            {!!  Form::submit('Müəllifi Yarat', ['class'=>'btn btn-primary ']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>
                <table id="meqaletable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Status</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($authors)
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$author->id}}</td>
                                <td>{{$author->name_az}}</td>
                                <td>{{$author->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$author->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal" data-target="#authors{{$author->id}}">
                                            Redaktə
                                        </button>

                                        <div class="modal fade" id="authors{{$author->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Şəkil əlavə edilməsi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($author, ['method'=>'PATCH', 'action'=>['AdminAuthorController@update', $author->id], 'files'=>true ]) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                                        <div class="row">
                                                            <div class="form-group">
                                                                {!! Form::label('name_az', 'Müəllifin adı AZ:') !!}
                                                                {!! Form::text('name_az', null, ['class' => ($errors->has('name_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                                <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                                            </div>

                                                            <div class="form-group">
                                                                {!! Form::label('name_ru', 'Müəllifin adı RU:') !!}
                                                                {!! Form::text('name_ru', null, ['class' => ($errors->has('name_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                                <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                                            </div>
                                                            <div class="form-group">
                                                                {!! Form::label('name_en', 'Müəllifin adı EN:') !!}
                                                                {!! Form::text('name_en', null, ['class' => ($errors->has('name_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                                <small class="text-danger">{{ $errors->first('name_en') }}</small>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('status', 'Status:') !!}
                                                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,$author->status, ['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-sm-12" style="text-align: right;">
                                                            <div class="form-group">
                                                                {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary ']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminAuthorController@destroy', $author->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Əminsiniz?')"><i class="fas fa-trash-alt"></i> Sil</button>
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
        $(document).ready(function() {
            $('#meqaletable').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );

        @if(session()->has('errCanNot'))
            alert('Kateqoriya istifadə olunur. Pozula bilməz!');
        @endif

    </script>
@stop
