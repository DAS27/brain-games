install:
	composer install

lint:
	composer exec phpcs -- --standard=PSR12 src bin

lint-fix:
	composer exec phpcbf -- --standard=PSR12 src bin