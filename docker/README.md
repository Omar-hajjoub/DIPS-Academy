# Docker Configuration

هذا المجلد يحتوي على ملفات التكوين الخاصة بـ Docker.

## الملفات

- `nginx/default.conf` - تكوين Nginx
- `php/local.ini` - إعدادات PHP
- `mysql/my.cnf` - إعدادات MySQL

## الخدمات المتاحة

- **app** - PHP 8.2 FPM
- **nginx** - Nginx Web Server
- **db** - MySQL 8.0
- **redis** - Redis Cache
- **phpmyadmin** - phpMyAdmin Interface

## المنافذ

- `8000` - Laravel Application
- `3306` - MySQL
- `6379` - Redis
- `8080` - phpMyAdmin
