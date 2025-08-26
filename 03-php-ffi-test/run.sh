#!/usr/bin/env sh

cd "$(dirname "$0")"

TAG=localhost/tmp_runjs_test:test
CONTAINER=tmp_runjs_test
EXPORT="../layers"

docker build -t "$TAG" -f - "$EXPORT" < Dockerfile || exit 1
docker run --rm -i --name "$CONTAINER" "$TAG" php < test.php
