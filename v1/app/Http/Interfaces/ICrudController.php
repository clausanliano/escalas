<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

interface ICrudController
{
    public function index(Request $request);
    public function create();
    public function store(FormRequest $request);
    public function edit(Model $objeto);
    public function update(FormRequest $request);
    public function destroy(Model $objeto);
}

?>
