.DEFAULT_GOAL := help

build:
	docker-compose build

serve:
	docker-compose up -d

stop:
	docker-compose stop

applogin:
	docker-compose exec app bash

dblogin:
	docker-compose exec db bash

seed:
	docker-compose run --rm php php artisan db:seed --class=DatabaseSeeder

migrate:
	docker-compose run --rm php php artisan migrate

migrate-rollback:
	docker-compose run --rm php php artisan migrate:rollback
