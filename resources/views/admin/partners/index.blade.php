@extends('layouts.admin')

@section('content')
    <div class="col">
        <section class="card">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.partners.create') }}"> <button type="button" class="mb-1 mt-1 me-1 btn btn-primary pull-right" ><i class="fas fa-plus"></i> Yeni</button></a>

                </div>
            </div>
            <header class="card-header">
                <h2 class="card-title"> Hərrac Təşkilatlar </h2>
            </header>
            <div class="card-body">

                <table id="partners_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Təşkilatın adı</th>
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
                                <td><img height="50" src="{{ asset('files/img/partners/'.$partner->photo->file) }}"
                                         alt=""></td>
                                <td><a href="{{route('admin.partners.edit', $partner->id)}}">{{$partner->name}}</a></td>
                                <td>{{$partner->status == 1 ? 'Aktiv' : 'Deaktiv'}}</td>
                                <td>{{$partner->updated_at->diffForhumans()}}</td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <a class="mb-1 mt-1 me-1 btn btn-default" style="display: inline-flex;" href="{{route('admin.partners.edit', $partner->id)}}"><i class="fas fa-pencil-alt"></i> Dəyiş</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPartnersController@destroy', $partner->id], 'style'=>"display: inline-flex;"]) !!}
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#partners_table').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@stop
