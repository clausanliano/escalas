@extends('adminlte::page')

@section('title', $titulo)


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-dark mt-4">
            <div class="card-header">
                <h3 class="card-title">Exibir: {{ $titulo }}</h3>
            </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input disabled type="text" name="nome" id="nome" class="form-control" value="{{ $objeto->nome}}">
            </div>
            <div class="form-group">
                <label for="sigla">Sigla</label>
                <input disabled type="text" name="sigla" id="sigla" class="form-control" value="{{ $objeto->sigla}}">
            </div>
            <div class="form-group">
                <label for="unidade_superior">Unidade Superior</label>
                <input disabled type="text"
                    name="unidade_superior"
                    id="unidade_superior"
                    class="form-control"
                    value="@isset($objeto->unidade_superior) {{ $objeto->unidade_superior->sigla }} ({{ $objeto->unidade_superior->nome }}) @endisset">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input disabled type="text"
                    name="empresa"
                    id="empresa"
                    class="form-control"
                    value="@isset($objeto->empresa) {{ $objeto->empresa->sigla }} ({{ $objeto->empresa->nome }}) @endisset">
            </div>

        </div>
        <div class="card-footer ">
            <div class="row">
                <div class="col-md-2 d-flex justify-content-between">
                    <a class="btn btn-primary" href="{{  route( $prefixo_rota.'.index' )}}">Voltar</a>
                </div>
        </div>
    </div>
</div>

@stop

