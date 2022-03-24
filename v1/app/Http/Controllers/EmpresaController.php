<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Services\EmpresaService;

class EmpresaController extends CrudController
{

    public function __construct()
    {
        $this->campos = ['nome', 'sigla',];
        $this->pasta_view = 'empresas';
        $this->titulo = 'Empresas';
        $this->prefixo_rota = 'empresas';
        $this->service = new EmpresaService();
    }

    public function store(StoreEmpresaRequest $request)
    {
        $campos = $request->only($this->campos);
        return $this->protected_store($campos);
    }

    public function update(UpdateEmpresaRequest $request, $id)
    {
        $campos = $request->only($this->campos);
        return $this->protected_update($campos, $id);
    }


}
