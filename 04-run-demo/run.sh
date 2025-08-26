#!/usr/bin/env sh

if command -v docker-compose; then
 DC="docker-compose"
else
 DC="docker compose"
fi

cd "$(dirname "$0")"

$DC up || exit 1
