@extends('layouts/admin')

@section('content')

    <div class="col">
        <section class="card">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.users.create') }}"> <button type="button" class="mb-1 mt-1 me-1 btn btn-primary pull-right" ><i class="fas fa-plus"></i> Yeni</button></a>

                </div>
            </div>
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">İstifadəçilər</h2>
            </header>
            <div class="card-body">

                <table class="table table-bordered table-striped mb-0" id="datatable-default">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad</th>
                            <th>Hesab</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Status</th>
                            <th>Yaradılıb</th>
                            <th>Yenilənib</th>
                            <th>Əməliyyat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->id}}</a></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role ? $user->role->name : "User has no role"}}</td>
                                    <td>{{$user->is_active == 1 ? "Aktiv" : "Passiv"}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>{{$user->updated_at->diffForHumans()}}</td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <a class="mb-1 mt-1 me-1 btn btn-default" style="display: inline-flex;" href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-pencil-alt"></i> Dəyiş</a>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'style'=>"display: inline-flex;"]) !!}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="mb-1 mt-1 me-1 btn btn-default" onclick="return confirm('Əminsiniz?')"><i class="far fa-trash-alt"></i> Sil</button>
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

