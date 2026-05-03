.PHONY: up down test migrate seed fresh lint

up:
	./vendor/bin/sail up

down:
	./vendor/bin/sail down

test:
	./vendor/bin/sail test

migrate:
	./vendor/bin/sail artisan migrate

seed:
	./vendor/bin/sail artisan db:seed

fresh:
	./vendor/bin/sail artisan migrate:fresh --seed

lint:
	./vendor/bin/sail npm run lint
