<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function gerar() {
        $dados = DB::table('livros_por_autor')->get()->groupBy('autor_nome');
        $pdf = Pdf::loadView('relatorio', compact('dados'));
        return $pdf->download('relatorio_livros_por_autor.pdf');
    }
}
