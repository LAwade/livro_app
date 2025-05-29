<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AutorController extends Controller
{
    public function index()
    {
        try {
            $autores = Autor::all();
            if ($autores->isEmpty()) {
                return view('autores.index', ['autores' => []]);
            }
            return view('autores.index', compact('autores'));
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao buscar autores: ' . $e->getMessage());
            return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao carregar autores']);
        }
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(['nome' => 'required|string']);
            $autor = Autor::create($validated);
            if (!$autor) {
                return redirect()->route('autores.index')->withErrors(['error' => 'Erro ao criar autor']);
            }
            return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('autores.index')->withErrors([
                'message' => 'Erro de validação',
                'errors' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao criar autor: ' . $e->getMessage());
            return redirect()->route('autores.index')->withErrors(['error' => 'Ocorreu um erro ao criar o autor.']);
        }
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        try {
            $validated = $request->validate(['nome' => 'required|string']);
            $autor->update($validated);
            return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('autores.index')->withErrors([
                'message' => 'Erro de validação',
                'errors' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao buscar autor para atualização: ' . $e->getMessage());
            return redirect()->route('autores.index')->withErrors(['error' => 'Erro ao atualizar autor']);
        }
    }

    public function destroy(Autor $autor)
    {
        try {
            if ($autor->livros()->exists()) {
                return redirect()->route('autores.index')->withErrors(['error' => 'Autor não pode ser excluído, pois está associado a livros']);
            }

            $autor->delete();
            return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso');
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao excluir autor: ' . $e->getMessage());
            return redirect()->route('autores.index')->withErrors(['error' => 'Erro ao excluir autor']);
        }
    }
}
