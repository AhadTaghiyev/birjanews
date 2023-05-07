@extends('layouts.admin')

@section('content')

    <div class="col-sm-1"> </div>

    <div class="col-sm-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Abunəçilər</h5>
            </div>
            <div class="card-body">

                <table id="meqaletable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Yenilənib</th>
                        <th>Əməliyyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($emails)
                        @foreach($emails as $email)
                            <tr>
                                <td>{{$email->id}}</td>
                                <td>{{$email->email}}</td>
                                <td>{{$email->status == 1 ? "Aktiv" : "Passiv"}}</td>
                                <td>{{$email->updated_at->diffForHumans()}}</td>
                                <td>

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
