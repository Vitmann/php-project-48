lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin tests

test:
	composer exec --verbose phpunit teststest:

test-coverage:
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-clover clover.xml tests

run:
	gendiff src/file1.json src/file2.json