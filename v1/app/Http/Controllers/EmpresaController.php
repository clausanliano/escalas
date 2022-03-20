<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    protected $campos, $classe, $pasta_view, $titulo, $prefixo_rota;

    public function __construct(Empresa $classe)
    {
        $this->classe = $classe;
        $this->campos = ['nome', 'sigla',];
        $this->pasta_view = 'empresas';
        $this->titulo = 'Empresas';
        $this->prefixo_rota = 'empresas';
    }

    public function index(Request $request)
    {
        $qtd_registros = $request->qtd_registros ?? 5;
        $filtro = $request->filtro ?? '';

        $collection = $this->classe::where('nome', 'like', "%$filtro%")
                        ->orWhere('sigla', 'like', "%$filtro%")
                        ->paginate($qtd_registros);

        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;

        return view($this->pasta_view.'.index')->with(compact('collection', 'qtd_registros', 'filtro', 'titulo', 'prefixo_rota'));
    }

    public function create()
    {
        $objeto = $this->classe;

        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;

        return view($this->pasta_view.'.edit')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function store(StoreEmpresaRequest $request)
    {
        $this->classe::create($request->only($this->campos));
        return redirect()->route($this->pasta_view.'.index');
    }

    public function show(Empresa $empresa)
    {
        $objeto = $empresa;

        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;

        return view($this->pasta_view.'.show')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function edit(Empresa $empresa)
    {
        $objeto = $empresa;

        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;

        return view($this->pasta_view.'.edit')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->only($this->campos));
        return redirect()->route($this->pasta_view.'.index');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route($this->pasta_view.'.index');
    }
}
