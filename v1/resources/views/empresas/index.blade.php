@extends('adminlte::page')

@section('title', $titulo)


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-dark mt-4">
            <div class="card-header">
                <h3 class="card-title">{{ $titulo }}</h3>
            </div>
        <div class="card-body">
            {{-- Toolbar da tabela --}}
            <form action="{{ route($prefixo_rota.'.index')}}" method="get">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-start">
                        <label for="qtd_registros">Mostrar &nbsp;&nbsp;</label>
                        <select class="form-control" name="qtd_registros" id="qtd_registros" style="width: 2cm">
                            @foreach ([5, 10, 25, 50, 100] as $item)
                                <option value={{ $item }} @if ($item == $qtd_registros) selected @endif >{{ $item }}</option>
                            @endforeach
                        </select>
                        <label for="qtd_registros">&nbsp;&nbsp;registros</label>
                    </div>
                    <div class="col-md-4 d-flex justify-content-between">
                        <label for="filtro">Filtro:&nbsp;&nbsp;</label>
                        <input  value="{{ $filtro }}" id="filtro" name="filtro" type="text" class="form-control" >
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-secondary float-right">Buscar</button>

                    </div>
                </div>
            </form>
            {{-- Toolbar da tabela --}}
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->sigla }}</td>
                            <td class="col-2">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-primary mr-2" href="{{ route($prefixo_rota.'.show', $item) }}">
                                        <i class="fa fa-eye" ></i>
                                    </a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-warning mr-2" href="{{ route($prefixo_rota.'.edit', $item) }}">
                                        <i class="fa fa-pen" ></i>
                                    </a>
                                </div>
                                <div class="btn-group" role="group">
                                    <form action="{{ route($prefixo_rota.'.destroy', $item)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash" ></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Paginação --}}
        </div>
        <div class="card-footer ">
            <div class="row">
                <div class="col-md-6 ">
                    <a class="btn btn-success" href="{{  route($prefixo_rota.'.create' )}}">Criar</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                {{
                    $collection->appends([
                        'filtro' => request()->get('filtro', ''),
                        'qtd_registros' => request()->get('qtd_registros', 5),
                    ])->links()
                }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop

