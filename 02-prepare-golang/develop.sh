#!/usr/bin/env sh

DIR="$(realpath "$(dirname "$0")")"
docker run --rm -it -w /runjs -v "$DIR"/runjs:/runjs golang:1.24.3-bullseye bash
