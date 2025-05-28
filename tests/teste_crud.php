<?php

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{get, post, put, delete};

// uses(RefreshDatabase::class);

// // Livros CRUD

// test('pode listar livros', function () {
//     Livro::factory()->count(3)->create();
//     get('/livros')->assertStatus(200);
// });

// test('pode criar livro', function () {
//     $assunto = Assunto::factory()->create();
//     $autores = Autor::factory()->count(2)->create();

//     $response = post('/livros', [
//         'titulo' => 'Livro Teste',
//         'data_publicacao' => '2023-01-01',
//         'valor' => 99.90,
//         'assunto_id' => $assunto->id,
//         'autores' => $autores->pluck('id')->toArray()
//     ]);

//     $response->assertRedirect('/livros');
//     $this->assertDatabaseHas('livros', ['titulo' => 'Livro Teste']);
// });

// test('pode editar livro', function () {
//     $livro = Livro::factory()->create();
//     $livro->assunto()->associate(Assunto::factory()->create());
//     $livro->save();

//     put("/livros/{$livro->id}", [
//         'titulo' => 'Novo Título',
//         'data_publicacao' => '2024-05-01',
//         'valor' => 88.00,
//         'assunto_id' => $livro->assunto_id,
//         'autores' => []
//     ])->assertRedirect('/livros');

//     $this->assertDatabaseHas('livros', ['titulo' => 'Novo Título']);
// });

// test('pode excluir livro', function () {
//     $livro = Livro::factory()->create();

//     delete("/livros/{$livro->id}")->assertRedirect('/livros');
//     $this->assertDatabaseMissing('livros', ['id' => $livro->id]);
// });

// // Autores CRUD

// test('pode criar autor', function () {
//     post('/autores', ['nome' => 'Autor Novo'])->assertRedirect('/autores');
//     $this->assertDatabaseHas('autores', ['nome' => 'Autor Novo']);
// });

// test('pode editar autor', function () {
//     $autor = Autor::factory()->create();
//     put("/autores/{$autor->id}", ['nome' => 'Editado'])->assertRedirect('/autores');
//     $this->assertDatabaseHas('autores', ['nome' => 'Editado']);
// });

// test('pode excluir autor', function () {
//     $autor = Autor::factory()->create();
//     delete("/autores/{$autor->id}")->assertRedirect('/autores');
//     $this->assertDatabaseMissing('autores', ['id' => $autor->id]);
// });

// // Assuntos CRUD

// test('pode criar assunto', function () {
//     post('/assuntos', ['descricao' => 'Tema X'])->assertRedirect('/assuntos');
//     $this->assertDatabaseHas('assuntos', ['descricao' => 'Tema X']);
// });

// test('pode editar assunto', function () {
//     $assunto = Assunto::factory()->create();
//     put("/assuntos/{$assunto->id}", ['descricao' => 'Atualizado'])->assertRedirect('/assuntos');
//     $this->assertDatabaseHas('assuntos', ['descricao' => 'Atualizado']);
// });

// test('pode excluir assunto', function () {
//     $assunto = Assunto::factory()->create();
//     delete("/assuntos/{$assunto->id}")->assertRedirect('/assuntos');
//     $this->assertDatabaseMissing('assuntos', ['id' => $assunto->id]);
// });
