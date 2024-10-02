## Introduction
This is the back-end of the GreenTech project. The front-end can be found in the repository below 🧐

`https://github.com/JoaoVitorHz/green-tech-next`

## Technologies Used
- PHP
- Laravel
- MySQL

## How to Use the Project
- To test the project, you need to have `Composer` installed on your machine.
- You also need to have `PHP` set as an environment variable!

- Now clone the repository.
- After cloning the repository, install the project dependencies.

 ```
     composer install
 ```
 - Create a database named `green_tech`.
- Create a `.env` file, copy the contents of the `.env.example` file into the `.env` file you created, and configure the environment variables.

- After configuring the environment variables in the `.env` file, run the migrations to create the database tables.

 ```
     php artisan migrate
 ```

- Now run the project.
 ```
     php artisan serve
 ```
