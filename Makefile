.PHONY: all setup up build-php build-runjs test-runjs build-demo

all: setup up

setup: build-php build-runjs test-runjs build-demo

build-php:
	./01-prepare-php/make_tar.sh

build-runjs:
	./02-prepare-golang/make_tar.sh

test-runjs:
	./03-php-ffi-test/run.sh

build-demo:
	./04-run-demo/build.sh

up:
	./04-run-demo/run.sh
