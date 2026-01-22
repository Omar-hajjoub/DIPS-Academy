# DIPS Academy - منصة تعليمية احترافية

منصة تعليمية شاملة مبينة على Laravel 11 مع Filament 3 لإدارة المحتوى التعليمي.

## 🚀 المميزات

- ✅ Laravel 11 مع أحدث الممارسات
- ✅ Docker كامل (PHP 8.2, MySQL 8.0, Redis, Nginx, phpMyAdmin)
- ✅ Filament 3 - لوحة تحكم Admin احترافية
- ✅ Laravel Breeze - نظام المصادقة
- ✅ Spatie Permission - إدارة الأدوار والصلاحيات
- ✅ نظام دورات تعليمية كامل
- ✅ نظام اختبارات وتقييمات
- ✅ نظام شهادات

## 📋 المتطلبات

- Docker & Docker Compose
- Git

## 🛠️ التثبيت

### 1. استنساخ المشروع

```bash
git clone <repository-url> dips-academy
cd dips-academy
```

### 2. إعداد Docker

```bash
docker-compose up -d --build
```

### 3. تثبيت المكتبات

```bash
docker-compose exec app composer install
docker-compose exec app npm install
```

### 4. إعداد البيئة

```bash
docker-compose exec app cp .env.example .env
docker-compose exec app php artisan key:generate
```

### 5. إعداد قاعدة البيانات

```bash
docker-compose exec app php artisan migrate --seed
```

### 6. بناء الأصول

```bash
docker-compose exec app npm run build
```

## 🔐 بيانات الدخول الافتراضية

### Super Admin
- **Email:** superadmin@dips-academy.com
- **Password:** password

### Admin
- **Email:** admin@dips-academy.com
- **Password:** password

### Instructor
- **Email:** instructor1@dips-academy.com
- **Password:** password

### Student
- **Email:** student1@dips-academy.com
- **Password:** password

## 🌐 الروابط

- **Laravel App:** http://localhost:8000
- **Filament Admin:** http://localhost:8000/admin
- **phpMyAdmin:** http://localhost:8080

## 📁 هيكل المشروع

```
dips-academy/
├── app/
│   ├── Filament/          # Filament Admin Resources
│   ├── Models/            # Eloquent Models
│   └── ...
├── database/
│   ├── migrations/        # Database Migrations
│   └── seeders/          # Database Seeders
├── docker/               # Docker Configuration
├── docker-compose.yml    # Docker Compose Setup
└── ...
```

## 🎯 الأدوار المتاحة

1. **Super Admin** - صلاحيات كاملة
2. **Admin** - إدارة المحتوى والمستخدمين
3. **Instructor** - إدارة الدورات والدروس
4. **Student** - التسجيل في الدورات ومتابعة التعلم

## 📝 الأوامر المفيدة

```bash
# تشغيل Docker
docker-compose up -d

# إيقاف Docker
docker-compose down

# الدخول إلى Container
docker-compose exec app bash

# تشغيل Migrations
docker-compose exec app php artisan migrate

# تشغيل Seeders
docker-compose exec app php artisan db:seed

# مسح Cache
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
```

## 🔧 التطوير

```bash
# تشغيل في وضع التطوير
docker-compose exec app npm run dev

# بناء الأصول للإنتاج
docker-compose exec app npm run build
```

## 📄 الترخيص

MIT License

## 👥 المساهمون

DIPS Academy Team
