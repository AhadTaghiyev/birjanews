@extends('layouts/admin')

@section('content')

  <div class="col-sm-1"> </div>

  <div class="col-sm-10">

      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="m-0 font-weight-bold text-white">İstifadəçilər</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('admin.users.create')}}" class="pull-right margin-bottom-20"><button type="button" class="btn btn-primary">İstifadəçi yarat</button></a>
                </div>
            </div>
          <table id="userstable" class="table table-striped table-bordered" style="width:100%">
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
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary margin-right-5"><i class="fas fa-edit"></i> Dəyiş</a>

                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
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
          $('#userstable').DataTable({
              "order": [[ 0, "desc" ]]
          });
      } );
  </script>
@stop
