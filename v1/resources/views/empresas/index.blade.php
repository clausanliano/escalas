@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    &nbsp;
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Empresas</h3>
            </div>
            <div class="card-body">
                <table id="example" class="stripe hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sigla</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->sigla }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h3 class="card-title">Empresas</h3>
            </div>
        </div>
    </div>

</div>


@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@stop
