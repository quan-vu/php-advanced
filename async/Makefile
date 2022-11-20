IMAGE_NAME   := php81_multi_thread
CONTAINER_NAME := ${IMAGE_NAME}_container

build:
	@docker image rm -f ${IMAGE_NAME}:latest
	@docker build -t ${IMAGE_NAME} .

verify: # Run and remove created container
	@docker run --rm ${IMAGE_NAME} --version
	@docker run --rm ${IMAGE_NAME} php main.php

ls:
	@docker run --rm php81_multi_thread ls -la
	@docker run --rm php81_multi_thread ls -la spatie_async
	@docker run --rm php81_multi_thread ls -la spatie_async/vendor

php: build # Eg: make php file=main.php
	@docker run --rm ${IMAGE_NAME} php $$file

multi-threads: build
	docker run --rm ${IMAGE_NAME} php spatie_async/delete_files_async.php

