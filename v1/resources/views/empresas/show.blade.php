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
                <input disabled type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $objeto->nome)}}">
            </div>

            <div class="class">
                <label for="sigla">Sigla</label>
                <input disabled type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla', $objeto->sigla)}}">
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

