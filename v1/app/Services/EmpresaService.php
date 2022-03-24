<?php

namespace App\Services;

use App\Models\Empresa;

class EmpresaService {

    protected $classe;

    public function __construct()
    {
        $this->classe = Empresa::class;
    }

    public function index($filtro = '', $qtd_registros = 5)
    {
        return $this->classe::where('nome', 'like', "%$filtro%")
                        ->orWhere('sigla', 'like', "%$filtro%")
                        ->paginate($qtd_registros);
    }

    public function store($valores)
    {
        return $this->classe::create($valores);
    }

    public function update( $valores, $id)
    {
        $objeto = $this->classe::findOrFail($id);

        return $objeto->update($valores);
    }

    public function buscar_objeto($id)
    {
        $objeto = $this->classe::findOrFail($id);
        return $objeto;
    }

    public function destroy($id)
    {
        $objeto = $this->classe::findOrFail($id);
        return $objeto->delete();
    }

    public function lista_ajax($filtro = '', $limite = 5)
    {
        return $this->classe::where('nome', 'like', "%$filtro%")
                        ->orWhere('sigla', 'like', "%$filtro%")
                        ->limit($limite)
                        ->get();
    }
}
