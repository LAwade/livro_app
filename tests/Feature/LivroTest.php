<?php

namespace Tests\Feature;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_livros()
    {
        Livro::factory()->count(3)->create();
        $response = $this->get('/livros');
        $response->assertStatus(200);
    }

    public function test_cria_livro()
    {
        $assunto = Assunto::factory()->create();
        $autores = Autor::factory()->count(2)->create();

        $response = $this->post('/livros', [
            'titulo' => 'Livro PHPUnit',
            'data_publicacao' => '2023-05-01',
            'valor' => 120.00,
            'assunto_id' => $assunto->id,
            'autores' => $autores->pluck('id')->toArray()
        ]);

        $response->assertRedirect('/livros');
        $this->assertDatabaseHas('livros', ['titulo' => 'Livro PHPUnit']);
    }

    public function test_edita_livro()
    {
        $livro = Livro::factory()->create(['titulo' => 'Original']);
        $assunto = Assunto::factory()->create();
        $autores = Autor::factory()->count(2)->create();

        $livro->assunto()->associate($assunto)->save();
        $livro->autores()->sync($autores->pluck('id'));

        $response = $this->put("/livros/{$livro->id}", [
            'titulo' => 'Atualizado',
            'data_publicacao' => '2024-01-01',
            'valor' => 99.99,
            'assunto_id' => $assunto->id,
            'autores' => $autores->pluck('id')->toArray(),
        ]);

        $response->assertRedirect('/livros');
        $this->assertDatabaseHas('livros', ['titulo' => 'Atualizado']);
    }

    public function test_exclui_livro()
    {
        $livro = Livro::factory()->create();
        $response = $this->delete("/livros/{$livro->id}");
        $response->assertRedirect('/livros');
        $this->assertDatabaseMissing('livros', ['id' => $livro->id]);
    }
}
