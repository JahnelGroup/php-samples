Apache/MySQL/PHP Stack
===================================
Illustrates a very basic implementation of a dockerized AMP stack.

# Todo List Sample Circut

This application is part of the Todo List sample circut. References to other implementations of a Todo List can be found in [JahnelGroup/challenges/todo-list](https://github.com/JahnelGroup/challenges/tree/master/todo-list).

# Structure

## File Structure

The overall file structure is as follows:

```text
/apache-php-mysql/
├── apache
│   ├── Dockerfile
│   └── demo.apache.conf
├── mysql
│   └── sql
│       └── schema.sql
├── php
│   └── Dockerfile
├── public_html
│   └── *.php
├── .env
└── docker-compose.yml
```

## MySQL

The root password is defined in [.env](./.env) and loaded as an envrionment variable in the [docker-compose.yml](./docker-compose.yml) file.

```yml
envrionment:
      MYSQL_ROOT_PASSWORD: "${DB_ROOT_PASSWORD}"
```

The default schema is defined in [schema.sql](./mysql/sql/schema.sql) and loaded as volume mount in the [docker-compose.yml](./docker-compose.yml) file.

```yml
volumes:
    - ./mysql/sql/:/docker-entrypoint-initdb.d/
```

## PHP
PHP connects to the database with [db_connect.php](./public_html/db_connect.php).

# Run

## Prerequisites

You will need to install [docker](https://docs.docker.com/install/) and [docker-compose](https://docs.docker.com/compose/install).

## Start

Bring up the entire stack with:

```bash
$ docker-compose up
```

The application can then be located at [http://localhost](http://localhost).

## Adminer

You can view that the database is up and schema was created with Adminer (previously known as phpMyAdmin). Navigate to [http://localhost:8080](http://localhost:8080) and login:

* System: MySQL
* Server: db
* Username: root
* Password: rootpassword
* Database: todolist
