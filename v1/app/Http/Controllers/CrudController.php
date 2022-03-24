<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    protected $campos, $pasta_view, $titulo, $prefixo_rota, $service;


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


    protected function protected_store($campos)
    {
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


    protected function protected_update($campos, $id)
    {
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


    /*
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
    */

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
