#   Instalação do DevBooks com Autenticação Sanctum

**Pré-requisitos:**

-   Docker instalado e configurado
-   Git instalado
-   Postman ou ferramenta similar para teste de API

**Passos:**

1.  **Clone o repositório:**

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-projeto
```

2.  **Crie o arquivo .env:**

Copie o conteúdo do arquivo `.env.example` para `.env` e faça as alterações necessárias, como banco de dados e credenciais.

3.  **Verifique a porta 80:**

Antes de iniciar o Docker, certifique-se de que a porta 80 esteja livre. Você pode verificar isso usando o comando:

```bash
netstat -ano | grep ':80'
```

Se houver algum processo usando a porta 80, pare-o antes de continuar.

4.  **Inicie o Docker:**

```bash
docker-compose up -d
```

5.  **Acesse a aplicação:**

A aplicação estará disponível em `http://localhost:80`.

6.  **Teste a API:**

As rotas disponíveis para a API são:


|Método |Rota |Descrição |Controller |Autenticação|
|---------|---------------------|-----------------------------|----------------------------|------------|
|POST |`/api/login`  |Autenticação de usuário |`AuthController@login`  |Não |
|POST |`/api/register`  |Registro de novo usuário |`RegisterController@store`  |Não |
|POST |`/api/logout`  |Desautenticação de usuário |`AuthController@logout`  |Bearer Token|
|GET |`/api/books`  |Lista todos os livros |`BookController@index`  |Bearer Token|
|POST |`/api/books`  |Cria um novo livro |`BookController@store`  |Bearer Token|
|GET |`/api/books/{book}`  |Exibe um livro específico |`BookController@show`  |Bearer Token|
|PUT/PATCH|`/api/books/{book}`  |Atualiza um livro específico |`BookController@update`  |Bearer Token|
|DELETE |`/api/books/{book}`  |Remove um livro específico |`BookController@destroy`  |Bearer Token|
|GET |`/api/stores`  |Lista todas as lojas |`StoreController@index`  |Bearer Token|
|POST |`/api/stores`  |Cria uma nova loja |`StoreController@store`  |Bearer Token|
|GET |`/api/stores/{store}`|Exibe uma loja específica |`StoreController@show`  |Bearer Token|
|PUT/PATCH|`/api/stores/{store}`|Atualiza uma loja específica |`StoreController@update`  |Bearer Token|
|DELETE |`/api/stores/{store}`|Remove uma loja específica |`StoreController@destroy`  |Bearer Token|



**Observações:**

-   As rotas que exigem autenticação Bearer Token exigem que o token seja enviado no cabeçalho da requisição.
-   Utilize o Postman ou ferramenta similar para testar a API.
-   Consulte a documentação do Laravel para mais informações sobre as rotas, autenticação e controllers.
-   Este guia é apenas um ponto de partida. Você pode personalizar a aplicação de acordo com suas necessidades.

