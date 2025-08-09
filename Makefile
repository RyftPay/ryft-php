.PHONY: install
install:
	composer install

.PHONY: fmt
fmt:
	./vendor/bin/phpcbf --standard=PSR12 --extensions=php --ignore=vendor --colors --tab-width=4 --encoding=utf-8 ./

.PHONY: lint
lint:
	./vendor/bin/phpcs --standard=PSR12 --extensions=php --ignore=vendor --colors --tab-width=4 --encoding=utf-8 ./

.PHONY: test
test:
	./vendor/bin/phpunit tests
