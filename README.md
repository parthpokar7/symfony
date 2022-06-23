# Start Symfony with Docker from ZERO 

### First you need to setup the Docker 
    
    To setup the best docker for your symfony 6 you can find it in 

>   [Docker Repository](https://github.com/parthpokar7/docker.git) 

    clone the repository and follow the steps mentioned in the "README.md" available in the mentioned repo.

### Clone the symfony 6 using composer and run it with Docker

```bash
cd <path to the Docker folder>
docker-compose exec php php compose.phar create-project symfony/skeleton:"6.1.*" <project_name>

```

> ***Your new project must be clonned beside the Docker folder***


**You have to stop the Docker to start your new Project in Docker and need to do some modification**

```bash
docker-compose down
```

go to the docker-compose.yml and change the volume of PHP

```diff
volumes:
-    - ../:/app:rw
+    - ../<project_name>:/app:rw
    - vscode_data:/root/.vscode-server
```

**Start docker**

```bash
docker-compose up -d
```

**Copy composer.phar into project**
```bash
cp composer.phar ../<project_name>/
```

**Install some basic required packages using composer** 
```bash
cd ../<project_name>
docker-compose exec php composer.phar require webapp
```
> ### *** Your project is clonned *** ###

### Run your Project locally

open URL [localhost:8080](http://localhost:8080/) in your browser

### Setting up databse with Mysql

change your .env file

```diff
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
+DATABASE_URL="mysql://root:root@mysql:3306/<Add your Database name here>?serverVersion=5.7&charset=utf8mb4"
-DATABASE_URL="postgresql://symfony:ChangeMe@127.0.0.1:5432/app?serverVersion=13&charset=utf8"
###< doctrine/doctrine-bundle ###
```
Change your docker-compose.yml in project folder **not from the docker**

```diff
###> doctrine/doctrine-bundle ###
-  database:
-    image: postgres:${POSTGRES_VERSION:-13}-alpine
-    environment:
-      POSTGRES_DB: ${POSTGRES_DB:-app}
-      # You should definitely change the password in production
-      POSTGRES_PASSWORD: ${POSTGRES_PASSWORD:-ChangeMe}
-      POSTGRES_USER: ${POSTGRES_USER:-symfony}
-    volumes:
+  database:
+    image: mysql:5.7
+    environment:
+      - MYSQL_ROOT_PASSWORD=root
+    volumes:
+      - ./mysql57:/var/lib/mysql
       # You may use a bind-mounted host directory instead, so that it is harder to accidentally remove the volume and lose all your data!
```

### ***your project is ready to work with Mysql and Docker***