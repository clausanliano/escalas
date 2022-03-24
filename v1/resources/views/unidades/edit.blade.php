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
                {{-- NOME --}}
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $objeto->nome)}}">
                </div>
                {{-- SIGLA --}}
                <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla', $objeto->sigla)}}">
                </div>
                {{-- UNIDADE_SUPERIOR_ID --}}
                <div>
                    <div class="form-group">
                        <label for="unidade_superior_id">Unidade Superior</label>
                        <select name='unidade_superior_id' id='unidade_superior_id' class="form-control">
                            @if (old('unidade_superior_id', $objeto->unidade_superior_id))
                                <option value="{{old('unidade_superior_id', $objeto->unidade_superior_id)}}" selected>
                                    {{ \App\Models\Unidade::find(old('unidade_superior_id', $objeto->unidade_superior_id))->nome }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>

                {{-- EMPRESA_ID --}}
                <div>
                    <div class="form-group">
                        <label for="empresa_id">Empresa</label>
                        <select name='empresa_id' id='empresa_id' class="form-control">
                            @if (old('empresa_id', $objeto->empresa_id))
                                <option value="{{old('empresa_id', $objeto->empresa_id)}}" selected>
                                    {{ \App\Models\Empresa::find(old('empresa_id', $objeto->empresa_id))->nome }}
                                </option>
                            @endif
                        </select>
                    </div>
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


@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
        /* Lista de Órgãos */
        $('#empresa_id').select2({
            placeholder: 'Selecione um Item',
            ajax: {
                url: '{{route("empresas.ajax")}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nome,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });



        /* Lista de Unidades */
        $('#unidade_superior_id').select2({
            placeholder: 'Selecione um Item',
            ajax: {
                url: '{{route("unidades.ajax")}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nome,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        @if(old('orgao_id'))
        var $newOption = $("<option selected='selected'></option>").val("{{ExibirAuxiliar::orgaoid(old('orgao_id'))->id}}").text("{{ExibirAuxiliar::orgaoid(old('orgao_id'))->nome}}")
        $("#orgao_id").append($newOption).trigger('change');
        @elseif(isset($objeto->orgao))
        var $newOption = $("<option selected='selected'></option>").val("{{$objeto->orgao->id}}").text("{{$objeto->orgao->nome}}")
        $("#orgao_id").append($newOption).trigger('change');
        @endif

    });
</script>

@stop

