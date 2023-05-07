@extends('layouts.admin')

@section('content')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Comments</h5>
            </div>
            <div class="card-body">
                <table id="commenttable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Blog_id</th>
                        <th>Bloq Tip</th>
                        <th>Ad</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Yaradılıb</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($comments)
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>
                                    @if($comment->type == 1)
                                        <a href="{{ route('blog', ['id'=>$comment->blog_id, 'locale'=>$comment->lang]) }}" target="_blank">{{$comment->blog_id}}</a>
                                    @elseif($comment->type == 2)
                                        <a href="{{ route('SpecialBlog', ['id'=>$comment->blog_id, 'locale'=>$comment->lang]) }}" target="_blank">{{$comment->blog_id}}</a>
                                    @endif
                                </td>
                                <td>{{$comment->type == 1 ? 'Blog' : 'Special Blog'}}</td>
                                <td>{{$comment->fullname}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->approve_status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$comment->created_at->diffForHumans()}}</td>
                                <td>
                                    <button type="button" class="mrg-b-5 btn btn-primary" data-toggle="modal" data-target="#comment{{$comment->id}}">
                                        Bax
                                    </button>
                                    <div class="modal fade" id="comment{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table width="100%" class="table">
                                                        <thead>
                                                        <tr>
                                                            <td scope="col">ID</td>
                                                            <td scope="col">{{ $comment->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Blog ID</td>
                                                            <td scope="col">

                                                                @if($comment->type == 1)
                                                                    <a href="{{ route('blog', ['id'=>$comment->blog_id, 'locale'=>$comment->lang]) }}" target="_blank"><button class="btn btn-primary">ID: {{$comment->blog_id}} - Bloqa keç</button> </a>
                                                                @elseif($comment->type == 2)
                                                                    <a href="{{ route('SpecialBlog', ['id'=>$comment->blog_id, 'locale'=>$comment->lang]) }}" target="_blank"><button class="btn btn-primary">ID: {{$comment->blog_id}} - Bloqa keç</button></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Bloq tip</td>
                                                            <td>{{$comment->type == 1 ? 'Blog' : 'Special Blog'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Name</td>
                                                            <td scope="col">{{ $comment->fullname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Email</td>
                                                            <td scope="col">{{ $comment->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Number</td>
                                                            <td scope="col">{{ $comment->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col">Text</td>
                                                            <td scope="col"> {!! $comment->text !!}</td>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                    @if($comment->approve_status == 0)
                                        {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['BlogComentsController@update', $comment->id] ]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="approve_status" value="1">
                                        <button type="submit" class="btn btn-success mrg-b-5" onclick="return confirm('Əminsiniz?')"><i class="fas fa-check"></i> Aktiv et</button>
                                        {!! Form::close()!!}
                                    @elseif($comment->approve_status == 1)
                                        {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['BlogComentsController@update', $comment->id] ]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="approve_status" value="0">
                                        <button type="submit" class="btn btn-warning mrg-b-5" onclick="return confirm('Əminsiniz?')"><i class="fas fa-times"></i> Passiv et</button>
                                        {!! Form::close()!!}
                                    @endif

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['BlogComentsController@destroy', $comment->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger mrg-b-5" onclick="return confirm('Əminsiniz?')"><i class="fas fa-trash-alt"></i> Sil</button>
                                        {!! Form::close()!!}
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
            $('#commenttable').DataTable({
        "order": [[ 0, "desc" ]]
    });
        } );
    </script>
@stop
