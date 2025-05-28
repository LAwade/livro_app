# README.md

## 📚 Projeto: Cadastro de Livros

Este projeto é um sistema de cadastro de livros com autores e assuntos, desenvolvido em **Laravel** e executado em ambiente **Docker**.

### 🔧 Requisitos
- Docker
- Docker Compose

### ▶️ Subindo o projeto
```bash
git clone <repo_url>
cd <pasta_projeto>
docker-compose up -d --build
```

### 🧰 Comandos úteis dentro do container Laravel
```bash
docker exec -it livro_app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --host=0.0.0.0 --port=8000
```

### 📂 Estrutura básica
- `app/Models` - Modelos Laravel
- `app/Http/Controllers` - Controladores REST
- `database/migrations` - Estrutura do banco
- `resources/views/report.blade.php` - View do relatório (PDF)

### 🌐 Acesso
- Aplicação: [http://localhost:8000](http://localhost:8000)
- phpMyAdmin: [http://localhost:8080](http://localhost:8080)

### ✅ Funcionalidades
- CRUD completo de Livros, Autores e Assuntos
- Associação de autores com livros (N:N)
- Relatório agrupado por autor (PDF via View do banco)
- Estilização com Bootstrap
- API REST documentada com Swagger