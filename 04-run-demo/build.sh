#!/usr/bin/env sh

if command -v docker-compose; then
 DC="docker-compose"
else
 DC="docker compose"
fi

cd "$(dirname "$0")"

$DC down --remove-orphans

$DC build || exit 1

$DC up -d

if test ! -f ./src/.env; then
cp ./src/.env.example ./src/.env
fi

chmod -R 0777 ./src/storage ./src/bootstrap/cache

echo "Laravel stage..."
$DC exec laravel php composer.phar install || exit 1
$DC exec laravel php artisan key:generate || exit 1

echo "NPM stage..."
$DC exec node npm ci || exit 1

$DC down
echo "Build - OK"
