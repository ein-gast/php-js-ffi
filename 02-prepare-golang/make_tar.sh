#!/usr/bin/env sh

cd "$(dirname "$0")"

TAG=localhost/tmp_runjs_golang:tmp
CONTAINER=tmp_golang_runjs
EXPORT="../layers"

docker build -t "$TAG" . || exit 1
docker rm -f "$CONTAINER"
docker run --name "$CONTAINER" "$TAG" true
docker cp "$CONTAINER":/export.tar.gz "$EXPORT"/runjs.tar.gz
docker rm -f "$CONTAINER"
