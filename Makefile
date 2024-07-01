lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin tests

test:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-clover clover.xml tests

run:
	gendiff src/file1.json src/file2.json