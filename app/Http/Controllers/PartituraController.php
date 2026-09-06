<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartituraController extends Controller
{
// En PartituraController.php
public function index() {
    return view('partituras.index', [
        'partituras' => \App\Models\Partitura::with(['autor', 'categoria', 'audio', 'documento'])->get(),
        'autores'    => \App\Models\Autor::all(),
        'audios'     => \App\Models\Audio::all(),
        'documentos' => \App\Models\Documento::all(),
        'categorias' => \App\Models\Categoria::all(),
    ]);
}
}
