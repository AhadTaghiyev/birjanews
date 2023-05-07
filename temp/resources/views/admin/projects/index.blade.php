@extends('layouts.admin')

@section('content')
    <div class="col-sm-1"></div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Layihələr</h5>
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
                            {!! Form::model($projectsSeo, ['method'=>'PATCH', 'action'=>['AdminProjectsSeoController@update', $projectsSeo[0]->id] ]) !!}
                            <div class="tab-content">
                                <div id="seo_az" class="tab-pane active">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                        {!! Form::text('seo_title_az', $projectsSeo[0]->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                        {!! Form::text('seo_keywords_az', $projectsSeo[0]->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                        {!! Form::text('seo_desctioption_az', $projectsSeo[0]->seo_desctioption_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                                    </div>
                                </div>
                                <div id="seo_ru" class="tab-pane fade">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_ru', 'SEO Title RU:') !!}
                                        {!! Form::text('seo_title_ru', $projectsSeo[0]->seo_title_ru, ['class' => ($errors->has('seo_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_ru', 'SEO Keywords RU:') !!}
                                        {!! Form::text('seo_keywords_ru', $projectsSeo[0]->seo_keywords_ru, ['class' => ($errors->has('seo_keywords_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_ru') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_ru', 'SEO Description RU:') !!}
                                        {!! Form::text('seo_desctioption_ru', $projectsSeo[0]->seo_desctioption_ru, ['class' => ($errors->has('seo_desctioption_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_desctioption_ru') }}</small>
                                    </div>
                                </div>
                                <div id="seo_en" class="tab-pane fade">
                                    <div class="form-group">
                                        {!! Form::label('seo_title_en', 'SEO Title EN:') !!}
                                        {!! Form::text('seo_title_en', $projectsSeo[0]->seo_title_en, ['class' => ($errors->has('seo_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_title_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_keywords_en', 'SEO Keywords EN:') !!}
                                        {!! Form::text('seo_keywords_en', $projectsSeo[0]->seo_keywords_en, ['class' => ($errors->has('seo_keywords_en')) ? 'form-control form-error' : 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('seo_keywords_en') }}</small>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('seo_desctioption_en', 'SEO Description EN:') !!}
                                        {!! Form::text('seo_desctioption_en', $projectsSeo[0]->seo_desctioption_en, ['class' => ($errors->has('seo_desctioption_en')) ? 'form-control form-error' : 'form-control']) !!}
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
                        <a  class="pull-right margin-bottom-20 btn btn-primary" href="{{route('admin.projects.create')}}">
                            Layihəni əlavə et
                        </a>
                    </div>
                    <div class="col-sm-6 pull-right margin-bottom-20">
                        <p>
                            <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Status
                            </a>
                        </p>
                        <div class="collapse " id="collapseExample">
                            <div class="card card-body">
                                {!! Form::model($projectsStatus, ['method'=>'PATCH', 'action'=>['AllowModelController@update', $projectsStatus[0]->id] ]) !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    {!! Form::label('status', 'Status:') !!}
                                    {!! Form::select('status', ['1'=>'Activ', '0'=>'Deaktiv'], $projectsStatus[0]->status , ['class' => ($errors->has('status')) ? 'form-control form-error' : 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-3 pull-right']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
                <table id="productstable" class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Müştəri</th>
                        <th>Kategoriya</th>
                        <th>Status</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($projects)
                        @foreach($projects as $project)
                            <tr>
                                <td>{{$project->id}}</td>
                                <td>{{$project->{'title_az'} }}</td>
                                <td>{{$project->client }}</td>
                                <td>{{$project->category_id != NULL ? $project->categoryProduct->title_az : ''}}</td>
                                <td>{{$project->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$project->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="pull-right margin-bottom-20 btn btn-primary">
                                            Redaktə
                                        </a>

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProjectsController@destroy', $project->id]]) !!}
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
            $('#productstable').DataTable({
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@stop
