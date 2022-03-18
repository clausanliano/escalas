<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;

class EmpresaController extends Controller
{
    public function index()
    {
        $collection = Empresa::all();
        return view('empresas.index')->with(compact('collection'));
    }

    public function create()
    {
        //
    }

    public function store(StoreEmpresaRequest $request)
    {
        //
    }

    public function show(Empresa $empresa)
    {
        //
    }

    public function edit(Empresa $empresa)
    {
        //
    }

    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        //
    }

    public function destroy(Empresa $empresa)
    {
        //
    }
}
