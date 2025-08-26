FROM golang:1.24.3-bullseye AS build

ADD runjs /runjs

RUN cd /runjs && \
    mkdir -p /opt/runjs && \
    go build -ldflags "-w" -buildmode=c-shared -o /opt/runjs/runjs.so . && \
    cp runjs_z.h /opt/runjs/runjs_z.h

RUN tar czf /export.tar.gz /opt/runjs/*
