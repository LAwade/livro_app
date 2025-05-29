<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    public function index()
    {
        try {
            $livros = Livro::with(['autores', 'assunto'])->get();
            return view('livros.index', compact('livros'));
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao buscar livros: ' . $e->getMessage());
            return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao carregar livros']);
        }   
    }

    public function create() {
        $assuntos = Assunto::all();
        $autores = Autor::all();
        return view('livros.create', compact('assuntos', 'autores'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titulo' => 'required|string',
                'data_publicacao' => 'required|date',
                'valor' => 'required|numeric',
                'assunto_id' => 'required|exists:assuntos,id',
                'autores' => 'required|array',
                'autores.*' => 'exists:autores,id'
            ]);

            $livro = Livro::create($validated);
            $livro->autores()->attach($validated['autores']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return view('livros.index', ['errors' => $e->errors()]);
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao criar livro: ' . $e->getMessage());
        }
        return redirect()->route('livros.index');
    }

    public function edit(Livro $livro)
    {
        try {
            $livro->load('autores');
            $assuntos = Assunto::all();
            $autores = Autor::all();
            return view('livros.edit', compact('livro', 'assuntos', 'autores'));
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao carregar livro: ' . $e->getMessage());
            return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao carregar livro']);
        }
    }

    public function update(Request $request, Livro $livro)
    {
        try {
            $validated = $request->validate([
                'titulo' => 'required|string',
                'data_publicacao' => 'required|date',
                'valor' => 'required|numeric',
                'assunto_id' => 'required|exists:assuntos,id',
                'autores' => 'required|array',
                'autores.*' => 'exists:autores,id'
            ]);

            $livro->update($validated);
            $livro->autores()->sync($validated['autores']);

            return redirect()->route('livros.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::channel('database_errors')->error('Erro ao atualizar livro: ' . print_r($e->errors(), true));
            return redirect()->route('livros.index')->withErrors($e->errors());
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao atualizar livro: ' . $e->getMessage());
            return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao atualizar livro: ' . $e->getMessage()]);
        }
    }

    public function destroy(Livro $livro)
    {
        try {
            $livro->delete();
            return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso');
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao deletar livro: ' . $e->getMessage());
        }
        return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao deletar livro: ' . $e->getMessage()]);
    }
}
