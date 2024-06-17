lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

test:
	composer exec --verbose phpunit teststest:

test-coverage:
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-clover clover.xml tests
