# Start Symfony with Docker from ZERO 

### first you need to setup the Docker 
    
    To setup the best docker for your symfony 6 you can find it in 

>   [Docker Repository](https://github.com/parthpokar7/docker.git) 

    clone the repository and follow the steps mentioned in the "README.md" available in the mentioned repo.

### clone the symfony 6 using composer 

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

**copy composer.phar into project**
```bash
cp composer.phar ../<project_name>/
```

### install some require packages using composer ###
```bash
cd ../<project_name>

docker-compose exec php composer.phar require webapp
```
> ### *** your project is clonned *** ###


