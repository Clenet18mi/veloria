.PHONY: up down build test migrate seed fresh lint shell install

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

install:
	docker compose exec app composer install
	docker compose exec vite npm install

test:
	docker compose exec app php artisan test

migrate:
	docker compose exec app php artisan migrate

seed:
	docker compose exec app php artisan db:seed

fresh:
	docker compose exec app php artisan migrate:fresh --seed

lint:
	docker compose exec vite npm run lint

shell:
	docker compose exec app bash
