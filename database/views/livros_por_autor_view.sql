CREATE OR REPLACE VIEW livros_por_autor AS
SELECT 
  a.id AS autor_id,
  a.nome AS autor_nome,
  l.id AS livro_id,
  l.titulo,
  l.data_publicacao,
  l.valor,
  s.descricao AS assunto
FROM autores a
JOIN autor_livro al ON al.autor_id = a.id
JOIN livros l ON l.id = al.livro_id
JOIN assuntos s ON s.id = l.assunto_id
ORDER BY a.nome, l.titulo;