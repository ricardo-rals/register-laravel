# Registro de usuários
Sistema desenvolvido com Laravel 9, PHP 8.1 e utilizei o Sanctum para autenticar os usuários.

# Back-End
1. Clone o repositório:
- `https://github.com/ricardo-rals/register-laravel.git`
2. Entre na pasta API
3. Crie um arquivo chamado **.env** e copie o conteúdo do arquivo **.env.exemple** para dentro dele e insira as informações do seu Banco de Dados
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
4. Execute o comando **composer install** para instalar as dependências
5. Faça a migrate para o seu Banco de Dados **php artisan migrate**
6. Por fim, rode o servidor **php artisan serve** e teste as rotas 
```
http://localhost:8000/api/register -> POST
http://localhost:8000/api/login -> POST
http://localhost:8000/api/users -> GET
http://localhost:8000/api/logout -> POST
```
