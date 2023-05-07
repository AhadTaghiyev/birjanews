@extends('layouts.admin')

@section('content')

    <div class="col">
        <section class="card">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.blog.index') }}">
                        <button type="button" class="mb-1 mt-1 me-1 btn btn-default btn-lg btn-block">Aktiv Elanlar</button>
                    </a>
                    <a href="#">
                        <button type="button" class="mb-1 mt-1 me-1 btn btn-primary btn-lg btn-block">Arxiv Elanlar</button>
                    </a>
                </div>
            </div>
            <header class="card-header">
                <h2 class="card-title"> Elanlar </h2>
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0" id="datatable-default">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlıq</th>
                        <th>Şəkil</th>
                        <th>Status</th>
                        <th>Yaradılıb</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($blogs)
                        @foreach($blogs as $blog)
                            <tr>
                                <td><a href="{{route('admin.blog.arxiv.edit', $blog->id)}}">{{$blog->id}}</a></td>
                                <td>{{$blog->title_az}}</td>
                                <td><img src="{{asset('files/img/blog/'.$blog->photo->file)}}" height="50px"></td>
                                <td>{{$blog->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$blog->created_at->diffForHumans()}}</td>
                                <td>{{$blog->updated_at->diffForHumans()}}</td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <a class="mb-1 mt-1 me-1 btn btn-default" style="display: inline-flex;"
                                       href="{{route('admin.blog.arxiv.edit', $blog->id)}}"><i class="fas fa-pencil-alt"></i>
                                        Dəyiş</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBlogArxivController@destroy', $blog->id], 'style'=>"display: inline-flex;"]) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="mb-1 mt-1 me-1 btn btn-default"
                                            onclick="return confirm('Əminsiniz?')"><i class="far fa-trash-alt"></i> Sil
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
