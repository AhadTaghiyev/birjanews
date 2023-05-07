@extends('layouts.admin')

@section('content')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Bloq Kategoriyaları</h5>
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
                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal" data-target="#category">
                            Kategoriya əlavə et
                        </button>
                    </div>


                    <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Kateqoriya əlavə edilməsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['method'=>'POST', 'action'=>['AdminBlogCategoryController@store'] , 'files'=>true]) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#category_az">AZ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#category_ru">RU</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#category_en">EN</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="category_az" class="tab-pane active">
                                            <br />
                                            <div class="form-group">
                                                {!! Form::label('name_az', 'Başlıq AZ:') !!}
                                                {!! Form::text('name_az', null, ['class' => ($errors->has('name_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                            </div>
                                        </div>
                                        <div id="category_ru" class="tab-pane fade">
                                            <br />
                                            <div class="form-group">
                                                {!! Form::label('name_ru', 'Başlıq RU:') !!}
                                                {!! Form::text('name_ru', null, ['class' => ($errors->has('name_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                            </div>
                                        </div>
                                        <div id="category_en" class="tab-pane fade">
                                            <br />
                                            <div class="form-group">
                                                {!! Form::label('name_en', 'Başlıq EN:') !!}
                                                {!! Form::text('name_en', null, ['class' => ($errors->has('name_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                <small class="text-danger">{{ $errors->first('name_en') }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('showStatus', 'Show Status:') !!}
                                                {!! Form::select('showStatus',array(1=>'Görsət', 0 => 'Gizlət') ,1, ['class'=>'form-control']) !!}
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
                                            {!!  Form::submit('Kategoriya Yarat', ['class'=>'btn btn-primary ']) !!}
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
                        <th>Başlıq</th>
                        <th>Status</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name_az}}</td>
                                <td>{{$category->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$category->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="pull-right margin-bottom-20 btn btn-primary" data-toggle="modal" data-target="#category{{$category->id}}">
                                            Redaktə
                                        </button>

                                        <div class="modal fade" id="category{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Şəkil əlavə edilməsi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminBlogCategoryController@update', $category->id], 'files'=>true ]) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#category_az{{$category->id}}">AZ</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#category_ru{{$category->id}}">RU</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#category_en{{$category->id}}">EN</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content">
                                                            <div id="category_az{{$category->id}}" class="tab-pane active">
                                                                <br />
                                                                <div class="form-group">
                                                                    {!! Form::label('name_az', 'Başlıq AZ:') !!}
                                                                    {!! Form::text('name_az', $category->name_az, ['class' => ($errors->has('name_az')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('name_az') }}</small>
                                                                </div>
                                                            </div>
                                                            <div id="category_ru{{$category->id}}" class="tab-pane fade">
                                                                <br />
                                                                <div class="form-group">
                                                                    {!! Form::label('name_ru', 'Başlıq RU:') !!}
                                                                    {!! Form::text('name_ru', $category->name_ru, ['class' => ($errors->has('name_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('name_ru') }}</small>
                                                                </div>
                                                            </div>
                                                            <div id="category_en{{$category->id}}" class="tab-pane fade">
                                                                <br />
                                                                <div class="form-group">
                                                                    {!! Form::label('name_en', 'Başlıq EN:') !!}
                                                                    {!! Form::text('name_en', $category->name_en, ['class' => ($errors->has('name_en')) ? 'form-control form-error' : 'form-control']) !!}
                                                                    <small class="text-danger">{{ $errors->first('name_en') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('showStatus', 'Show Status:') !!}
                                                                    {!! Form::select('showStatus',array(1=>'Görsət', 0 => 'Gizlət') ,$category->showStatus, ['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('status', 'Status:') !!}
                                                                    {!! Form::select('status',array(1=>'Aktiv', 0 => 'Passiv') ,$category->status, ['class'=>'form-control']) !!}
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

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBlogCategoryController@destroy', $category->id]]) !!}
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
