# تشغيل المشروع باستخدام Laragon (بدون Docker)

إذا واجهت مشاكل مع Docker، يمكنك تشغيل المشروع مباشرة باستخدام Laragon.

## 🚀 خطوات التشغيل

### 1. تأكد من أن Laragon يعمل
- افتح Laragon
- تأكد من أن Apache و MySQL يعملان

### 2. إعداد قاعدة البيانات

1. افتح phpMyAdmin من Laragon
2. أنشئ قاعدة بيانات جديدة باسم: `dips_academy`
3. أو استخدم قاعدة بيانات موجودة

### 3. إعداد المشروع

```bash
# انتقل إلى مجلد المشروع
cd C:\laragon\www\dips-acdayme\dips-academy

# تثبيت المكتبات
composer install
npm install

# إعداد البيئة
copy .env.example .env

# عدّل ملف .env:
# DB_HOST=127.0.0.1
# DB_DATABASE=dips_academy
# DB_USERNAME=root
# DB_PASSWORD=
# APP_URL=http://dips-academy.test

# توليد مفتاح التطبيق
php artisan key:generate

# نشر ملفات Filament و Spatie
php artisan filament:install --panels
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# تشغيل Migrations
php artisan migrate --seed

# بناء Assets
npm run build
```

### 4. الوصول للمشروع

- **Laravel App:** http://dips-academy.test
- **Filament Admin:** http://dips-academy.test/admin

### 5. بيانات الدخول

- **Email:** superadmin@dips-academy.com
- **Password:** password

## 📝 ملاحظات

- تأكد من إضافة `dips-academy.test` إلى hosts file في Laragon
- إذا لم يعمل، استخدم `http://localhost/dips-academy/public`
