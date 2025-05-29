<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssuntoController extends Controller
{
    public function index()
    {
        try {
            $assuntos = Assunto::all();
            if ($assuntos->isEmpty()) {
                return view('assuntos.index', ['assuntos' => []]);
            }

            return view('assuntos.index', compact('assuntos'));
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao listar assuntos: ' . $e->getMessage());
            return redirect()->route('livros.index')->withErrors(['error' => 'Erro ao carregar assuntos']);
        }
    }

    public function create() {
        return view('assuntos.create');
    }
    
    public function store(Request $request)
    {
        try {
            $validated = $request->validate(['descricao' => 'required|string']);
            $assunto = Assunto::create($validated);
            if (!$assunto) {
                return redirect()->route('assuntos.index')->withErrors(['error' => 'Erro ao criar assunto']);
            }
            return redirect()->route('assuntos.index')->with('success', 'Assunto criado com sucesso');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('assuntos.index')->withErrors([
                'message' => 'Erro de validação',
                'errors' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao criar assunto: ' . $e->getMessage());
            return redirect()->route('assuntos.index')->withErrors(['error' => 'Erro ao criar assunto']);
        }
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }
    public function update(Request $request, Assunto $assunto)
    {
        try {
            $validated = $request->validate(['descricao' => 'required|string']);
            $assunto->update($validated);
            if (!$assunto) {
                return redirect()->route('assuntos.index')->withErrors(['error' => 'Erro ao atualizar assunto']);
            }
            $assunto->refresh(); // Refresh the model to get the updated data
            return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('assuntos.index')->withErrors([
                'message' => 'Erro de validação',
                'errors' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao atualizar assunto: ' . $e->getMessage());
            return redirect()->route('assuntos.index')->withErrors(['error' => 'Erro ao atualizar assunto']);
        }
    }

    public function destroy(Assunto $assunto)
    {
        try {
            if ($assunto->livros()->exists()) {
                return redirect()->route('assuntos.index')->withErrors(['error' => 'Não é possível deletar assunto associado a livros']);
            }
            $assunto->delete();
            return redirect()->route('assuntos.index')->with('success', 'Assunto deletado com sucesso');
        } catch (\Exception $e) {
            Log::channel('database_errors')->error('Erro ao deletar assunto: ' . $e->getMessage());
            return redirect()->route('assuntos.index')->withErrors(['error' => 'Erro ao deletar assunto']);
        }
    }
}
