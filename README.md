# Dictionary API

Este projeto é uma API de dicionário que lista palavras em inglês, permite a busca, exibição de detalhes das palavras, e gerenciamento de favoritos e histórico de acesso.

## Tecnologias Usadas

- Laravel
- Redis
- JWT (para autenticação)
- PHPUnit (para testes)

## Como Instalar

1. Clone o repositório.
2. Execute `composer install` para instalar as dependências.
3. Configure o arquivo `.env` com suas credenciais de banco de dados e Redis.
4. Execute as migrações com `php artisan migrate`.
5. Popule o banco de dados com `php artisan db:seed`.
6. Acesse a API na URL configurada.

## Endpoints

- POST `/auth/register`: Cria um novo usuário.
- POST `/auth/signin`: Realiza login.
- GET `/entries/pt`: Lista palavras com paginação e busca.
- GET `/entries/pt/{word}`: Exibe detalhes de uma palavra.
- POST `/entries/pt/{word}/favorite`: Adiciona a palavra aos favoritos.
- DELETE `/entries/pt/{word}/unfavorite`: Remove a palavra dos favoritos.
- GET `/user/profile`: Retorna o perfil do usuário.
- GET `/user/history`: Retorna o histórico de palavras visitadas.
- GET `/user/favorites`: Retorna as palavras favoritas do usuário.
