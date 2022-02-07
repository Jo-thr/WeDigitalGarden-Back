FROM nginx:latest

RUN apt-get update && apt-get install curl -y

COPY ./run /usr/local/bin

ENTRYPOINT [ "run" ]
