@extends('adminlte::page')

@section('title', $titulo)


@section('content')

@include('includes.validations')

<div class="row">
    <div class="col-12">
        <div class="card card-dark mt-4">
            <div class="card-header">
                <h3 class="card-title">Cadastro: {{$titulo}}</h3>
            </div>
        @if ($objeto->id == 0 )
            <form action="{{ route($prefixo_rota.'.store') }}" method="post">
        @else
            <form action="{{ route($prefixo_rota.'.update', $objeto) }}" method="post">
                @method('PUT')
        @endif
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $objeto->nome)}}">
                </div>

                <div class="class">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla', $objeto->sigla)}}">
                </div>
            </div>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-2 d-flex justify-content-between">
                        <button class="btn btn-success" type="submit">Salvar</button>

                        <a class="btn btn-danger" href="{{  route($prefixo_rota.'.index' )}}">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

