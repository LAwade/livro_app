<?php

namespace Database\Seeders;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Assunto::factory()->count(3)->create();
        Autor::factory()->count(5)->create();
        Livro::factory()->count(10)->create()->each(function ($livro) {
            $livro->autores()->attach(Autor::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        });
    }
}
