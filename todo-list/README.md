Apache/PHP/MySQL Todo List
===================================
Inspired by and code forked from [Easy way to learn PHP](https://blog.devcenter.co/easy-way-to-php-todolist-app-crud-e1284265bb27) written by Mayomi Ayandiran. 

### Run

#### Docker-Compose
Bring up the entire stack with:

```bash
$ docker-compose up
```

#### Adminer
Validate that the database is up and schema was created with Adminer (previously known as phpMyAdmin). Navigate to [http://localhost:8080](http://localhost:8080) and login:

* System: MySQL
* Server: db
* Username: root
* Password: rootpassword
* Database: todolist

#### App
The applicationc can be located at [http://localhost](http://localhost).

### Structure 
The basic strucutre of the application is as follows.

```
/todo-list/
├── apache
│   ├── Dockerfile
│   └── demo.apache.conf
├── docker-compose.yml
└── mysql
    └── sql
        └── schema.sql
├── php
│   └── Dockerfile
└── public_html
    └── *.php       
```

### MySQL
The root password is defined in [.env](./.env) and loaded as an envrionment variable in the [docker-compose.yml](./docker-compose.yml) file.

```
envrionment:
      MYSQL_ROOT_PASSWORD: "${DB_ROOT_PASSWORD}"
```

The default schema is defined in [schema.sql](./mysql/sql/schema.sql) and loaded as volume mount in the [docker-compose.yml](./docker-compose.yml) file.

```
volumes:
    - ./mysql/sql/:/docker-entrypoint-initdb.d/
```

### PHP
PHP connects to the database with [db_connect.php](./public_html/db_connect.php).