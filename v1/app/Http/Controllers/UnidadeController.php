<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadeRequest;
use App\Http\Requests\UpdateUnidadeRequest;
use App\Services\UnidadeService;

class UnidadeController extends CrudController
{
    public function __construct()
    {
        $this->campos = ['nome', 'sigla', 'empresa_id', 'unidade_superior_id'];
        $this->pasta_view = 'unidades';
        $this->titulo = 'Unidades';
        $this->prefixo_rota = 'unidades';
        $this->service = new UnidadeService();
    }

    public function store(StoreUnidadeRequest $request)
    {
        $campos = $request->only($this->campos);
        return $this->protected_store($campos);
    }

    public function update(UpdateUnidadeRequest $request, $id)
    {
        $campos = $request->only($this->campos);
        return $this->protected_update($campos, $id);
    }


}
