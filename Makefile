.PHONY: help install up down restart logs shell migrate seed fresh

help: ## عرض قائمة الأوامر المتاحة
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## تثبيت المشروع بالكامل
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app npm install
	docker-compose exec app cp .env.example .env || true
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan migrate --seed
	docker-compose exec app npm run build

up: ## تشغيل Docker Containers
	docker-compose up -d

down: ## إيقاف Docker Containers
	docker-compose down

restart: ## إعادة تشغيل Docker Containers
	docker-compose restart

logs: ## عرض Logs
	docker-compose logs -f

shell: ## الدخول إلى App Container
	docker-compose exec app bash

migrate: ## تشغيل Migrations
	docker-compose exec app php artisan migrate

seed: ## تشغيل Seeders
	docker-compose exec app php artisan db:seed

fresh: ## إعادة إنشاء قاعدة البيانات
	docker-compose exec app php artisan migrate:fresh --seed

cache-clear: ## مسح Cache
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear
	docker-compose exec app php artisan view:clear

build: ## بناء Assets
	docker-compose exec app npm run build

dev: ## تشغيل في وضع التطوير
	docker-compose exec app npm run dev
