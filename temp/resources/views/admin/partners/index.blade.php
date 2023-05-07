@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Partnyorlar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 pull-right margin-bottom-20">
                        <p>
                            <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Status
                            </a>
                        </p>
                        <div class="collapse " id="collapseExample">
                            <div class="card card-body">
                                {!! Form::model($partnerStatus, ['method'=>'PATCH', 'action'=>['AllowModelController@update', $partnerStatus[0]->id] ]) !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    {!! Form::label('status', 'Status:') !!}
                                    {!! Form::select('status', ['1'=>'Activ', '0'=>'Deaktiv'], $partnerStatus[0]->status , ['class' => ($errors->has('status')) ? 'form-control form-error' : 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-3 pull-right']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.partners.create')}}" class="pull-right margin-bottom-20"><button type="button" class="btn btn-primary">Partnyor Yarat</button></a>
                    </div>
                </div>
                <table id="partners_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Şirkət adı</th>
                        <th scope="col">Status</th>
                        <th scope="col">Yenilənib</th>
                        <th scope="col">Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($partners)
                        @foreach($partners as $partner)
                            <tr>
                                <th>{{$partner->id}}</th>
                                <td><img height="50" src="{{ asset('files/img/partners/'.$partner->photo->file) }}" alt=""></td>
                                <td><a href="{{route('admin.partners.edit', $partner->id)}}">{{$partner->name}}</a></td>
                                <td>{{$partner->status == 1 ? 'Aktiv' : 'Deaktiv'}}</td>
                                <td>{{$partner->updated_at->diffForhumans()}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('admin.partners.edit', $partner->id)}}" class="btn btn-primary margin-right-5"><i class="fas fa-edit"></i> Dəyiş</a>

                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPartnersController@destroy', $partner->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Partnyoru silməyə əminsiniz?')"><i class="fas fa-trash-alt"></i> Sil</button>
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
            $('#partners_table').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@stop
