# 🚀 دليل البدء السريع - DIPS Academy

## ✅ ما تم إنجازه

تم إعداد المشروع بالكامل مع:

1. ✅ Laravel 11
2. ✅ Docker (PHP 8.2, MySQL 8.0, Redis, Nginx, phpMyAdmin)
3. ✅ Filament 3 Admin Panel
4. ✅ Laravel Breeze (جاهز للتثبيت)
5. ✅ Spatie Permission
6. ✅ جميع Migrations والجداول
7. ✅ جميع Models والعلاقات
8. ✅ Seeders للأدوار والبيانات التجريبية
9. ✅ Filament Resources (Courses, Users)
10. ✅ Git مع branches (main, develop, staging)

## 📋 الخطوات التالية

### 1. تشغيل Docker

```bash
cd dips-academy
docker-compose up -d --build
```

### 2. تثبيت المكتبات

```bash
docker-compose exec app composer install
docker-compose exec app npm install
```

### 3. إعداد البيئة

```bash
# نسخ ملف البيئة (إذا لم يكن موجوداً)
docker-compose exec app cp .env.example .env

# توليد مفتاح التطبيق
docker-compose exec app php artisan key:generate
```

### 4. نشر ملفات Filament و Spatie

```bash
# Filament
docker-compose exec app php artisan filament:install --panels

# Spatie Permission
docker-compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### 5. إعداد قاعدة البيانات

```bash
# تشغيل Migrations
docker-compose exec app php artisan migrate

# تشغيل Seeders
docker-compose exec app php artisan db:seed
```

### 6. بناء Assets

```bash
docker-compose exec app npm run build
```

## 🔐 بيانات الدخول

بعد تشغيل Seeders، يمكنك الدخول إلى:

### Filament Admin Panel
- **URL:** http://localhost:8000/admin
- **Email:** superadmin@dips-academy.com
- **Password:** password

### phpMyAdmin
- **URL:** http://localhost:8080
- **Username:** root
- **Password:** root

## 🎯 الأدوار المتاحة

1. **Super Admin** - صلاحيات كاملة
   - Email: superadmin@dips-academy.com
   - Password: password

2. **Admin** - إدارة المحتوى
   - Email: admin@dips-academy.com
   - Password: password

3. **Instructor** - إدارة الدورات
   - Email: instructor1@dips-academy.com
   - Password: password

4. **Student** - الطلاب
   - Email: student1@dips-academy.com
   - Password: password

## 📁 الهيكل الأساسي

```
dips-academy/
├── app/
│   ├── Filament/              # Filament Admin Resources
│   │   ├── Resources/         # CourseResource, UserResource
│   │   └── Pages/             # Dashboard
│   ├── Models/                # جميع Models
│   └── Providers/             # AdminPanelProvider
├── database/
│   ├── migrations/            # جميع Migrations
│   └── seeders/              # RoleSeeder, UserSeeder, CourseSeeder
├── docker/                    # Docker Configuration
└── docker-compose.yml         # Docker Setup
```

## 🛠️ أوامر مفيدة

```bash
# استخدام Makefile (أسهل)
make install      # تثبيت كامل
make up          # تشغيل Docker
make down        # إيقاف Docker
make migrate     # تشغيل Migrations
make seed        # تشغيل Seeders
make cache-clear # مسح Cache

# أو استخدام Docker مباشرة
docker-compose exec app php artisan [command]
docker-compose exec app npm [command]
```

## 📝 ملاحظات مهمة

1. **Laravel Breeze**: تم إضافته إلى composer.json، لكن يحتاج تثبيت:
   ```bash
   docker-compose exec app php artisan breeze:install
   ```

2. **Filament**: تم إعداد AdminPanelProvider، لكن يحتاج نشر الملفات:
   ```bash
   docker-compose exec app php artisan filament:install --panels
   ```

3. **Spatie Permission**: يحتاج نشر ملف التكوين:
   ```bash
   docker-compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
   ```

## 🎉 جاهز للعمل!

المشروع جاهز الآن. ابدأ بتشغيل Docker واتبع الخطوات أعلاه.

---

**ملاحظة**: إذا واجهت أي مشاكل، راجع ملف `SETUP.md` أو `README.md`
