## Introdução 
Esse é o back-end o projeto GreenTech, o front-end esta no repositorio abaixo 🧐

`https://github.com/JoaoVitorHz/green-tech-next`

## Tecnologias Usadas 
- PHP
- Laravel
- MySql
  
 ## Para usar o projeto 
 - Para você testar o projeto e necessario que você tenha o `composer` instalado na sua maquina
 - E também tenho  o `PHP` como variavel de ambiente!
 
 - Agora faça clone do repositorio.
 - Depois de clonar o repostiorio instale as dependecia do projeto.
 ```
     composer install
 ```
 - Crie um banco de dados chamando `green_tech`
 - Crie um arquivo .env, copie oque estiver dentro do arquivo .env.example para dentro do arquivo .env que você criou e configure as variaveis de ambiente.

 - Depois de configurar as variaveis de ambiente dentro do arquivo .env, execute as migration para criar as tabelas do banco de dados.
 ```
     php artisan migrate
 ```

- Agora rode o projeto
 ```
     php artisan serve
 ```
