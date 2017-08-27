# nasa test application

Nasa test application

## Build docker

### On GNU/Linux and Mac

use ./build script from root folder

### On Windows

build images from the docker folder and map the source of the application to the src from root folder

## Run on local

### On GNU/Linux and Mac

- if you use the ./build script open localhost:8080
- if you build in another way follow the port forwarding

### On Windows

- follow the port forwarding after image is run

## Run images manually

### On GNU/Linux and Mac

If you do not follow build till the end you can ./run and follow the steps

### On Windows

Run manually mysql image and app/server image you build in the previous step

## Starting containers

- docker ps -a
- start mysql-server
- start dev-server

## Installing db

It shall be automatic on dev-server start - it takes time for the first run, so be patient

If it does not run automatically by some reason in dev-server in /nasa there shall be a ./nasa-start
If errors occured they shall be in /nasa/nasa.initialization.log
While waiting you can tail -f /nasa/nasa.initialization.log
