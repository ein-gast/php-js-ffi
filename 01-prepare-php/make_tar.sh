#!/usr/bin/env sh

cd "$(dirname "$0")"

TAG=localhost/tmp_runjs_ffi:test
CONTAINER=tmp_runjs_ffi
EXPORT="../layers"

docker build -t "$TAG" . || exit 1
docker rm -f "$CONTAINER"
docker run --name "$CONTAINER" "$TAG" php -m
docker cp "$CONTAINER":/export.tar.gz "$EXPORT"/ffi.tar.gz
docker rm -f "$CONTAINER"
