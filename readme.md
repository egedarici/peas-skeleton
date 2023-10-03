# Getting set up
We suggest running this project in a docker container. Docker is a tool that allows for running applications in a
consistent environment which is isolated from the host computer. You are however welcome to run this anyway you feel most
comfortable!

## Running with docker
First install Docker for your OS (https://docs.docker.com/desktop/). Then, in a terminal in this directory run (replacing
PATH with the location of peas-skeleton on your host):

`docker run --rm --entrypoint sh -it -w /src -v PATH/peas-skeleton/src:/src php:8.2.11-cli-alpine3.18` 

Docker should then download an image which can run php applications for you, and launch a shell. If you have any difficulty
getting it running with Docker, please get in touch. 

## Running the skeleton
In a shell you can run `php index.php display` or `php index.php generate` and see the output of running the functions
in `src/index.php` along with any further arguments you provide to the command line. Please update this documentation to 
detail what arguments you expect to be provided. 
