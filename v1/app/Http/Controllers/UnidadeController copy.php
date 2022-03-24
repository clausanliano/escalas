<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Http\Requests\StoreUnidadeRequest;
use App\Http\Requests\UpdateUnidadeRequest;
use Illuminate\Http\Request;
use App\Services\UnidadeService;

class UnidadeController extends Controller
{
    protected $campos, $classe, $pasta_view, $titulo, $prefixo_rota, $service;

    public function __construct(Unidade $classe)
    {
        $this->classe = $classe;
        $this->campos = ['nome', 'sigla', 'empresa_id', 'unidade_superior_id'];
        $this->pasta_view = 'unidades';
        $this->titulo = 'Unidades';
        $this->prefixo_rota = 'unidades';
        $this->service = new UnidadeService();
    }

    public function index(Request $request)
    {
        $qtd_registros = $request->qtd_registros;
        $filtro = $request->filtro;
        try {
            $collection = $this->service->index($filtro, $qtd_registros);
        } catch (\Throwable $th) {
            throw $th;
        }
        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;
        return view($this->pasta_view.'.index')
            ->with(compact('collection', 'qtd_registros', 'filtro', 'titulo', 'prefixo_rota'));
    }

    public function create()
    {
        $objeto = $this->classe;
        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;
        return view($this->pasta_view.'.edit')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function store(StoreUnidadeRequest $request)
    {
        $campos = $request->only($this->campos);
        try {
            $this->service->store($campos);
            $aviso = [
                'mensagem' => 'Objeto salvo com sucesso!',
                'tipo' => 'success'
            ];
        } catch (\Throwable $th) {
            $aviso = [
                'mensagem' => 'Erro ao criar objeto!',
                'tipo' => 'danger'
            ];
        }
        return redirect()->route($this->pasta_view.'.index')->with($aviso);
    }

    public function show($id)
    {
        $objeto =  $this->service->buscar_objeto($id);
        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;
        return view($this->pasta_view.'.show')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function edit($id)
    {
        $objeto =  $this->service->buscar_objeto($id);
        $titulo = $this->titulo;
        $prefixo_rota = $this->prefixo_rota;
        return view($this->pasta_view.'.edit')->with(compact('objeto', 'titulo', 'prefixo_rota'));
    }

    public function update(UpdateUnidadeRequest $request, $id)
    {
        $campos = $request->only($this->campos);
        try {
            $this->service->update( $campos, $id);
            $aviso = [
                'mensagem' => 'Objeto editado com sucesso!',
                'tipo' => 'success'
            ];

        } catch (\Throwable $th) {
            $aviso = [
                'mensagem' => 'Erro ao editar objeto!',
                'tipo' => 'danger'
            ];
        }
        return redirect()->route($this->pasta_view.'.index')->with($aviso);
    }

    public function destroy($id)
    {
        try {
            $this->service->destroy($id);
            $aviso = [
                'mensagem' => 'Objeto apagado com sucesso!',
                'tipo' => 'success'
            ];

        } catch (\Throwable $th) {
            $aviso = [
                'mensagem' => 'Erro ao apagar objeto!',
                'tipo' => 'danger'
            ];
        }
        return redirect()->route($this->pasta_view.'.index')->with($aviso);
    }


    public function ajax(Request $request){
        $filtro = $request->q;
        try {
            $collection = $this->service->lista_ajax($filtro);
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json($collection);
    }

}
