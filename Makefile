up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

build:
	docker-compose up --build -d

init: down build up

enter:
	docker-compose exec php-cli bash -i

perm:
	sudo chown -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache