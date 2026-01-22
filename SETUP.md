# دليل الإعداد السريع - DIPS Academy

## 🚀 خطوات الإعداد

### 1. تثبيت المكتبات

```bash
# داخل Docker Container
docker-compose exec app composer install
docker-compose exec app npm install
```

### 2. إعداد البيئة

```bash
# نسخ ملف البيئة
docker-compose exec app cp .env.example .env

# توليد مفتاح التطبيق
docker-compose exec app php artisan key:generate
```

### 3. إعداد قاعدة البيانات

```bash
# تشغيل Migrations
docker-compose exec app php artisan migrate

# تشغيل Seeders
docker-compose exec app php artisan db:seed
```

### 4. نشر ملفات Filament

```bash
docker-compose exec app php artisan filament:install --panels
```

### 5. نشر ملفات Spatie Permission

```bash
docker-compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### 6. بناء Assets

```bash
docker-compose exec app npm run build
```

## 🔐 إنشاء مستخدم Admin

بعد تشغيل Seeders، يمكنك الدخول بـ:
- **Email:** superadmin@dips-academy.com
- **Password:** password

## 📝 ملاحظات مهمة

1. تأكد من أن Docker يعمل قبل البدء
2. جميع الأوامر يجب تنفيذها داخل Docker Container
3. قاعدة البيانات ستُنشأ تلقائياً عند تشغيل Docker
4. يمكنك استخدام Makefile لتسهيل الأوامر: `make install`

## 🐛 حل المشاكل

### مشكلة في الاتصال بقاعدة البيانات
```bash
# تحقق من أن MySQL Container يعمل
docker-compose ps

# إعادة تشغيل Containers
docker-compose restart
```

### مشكلة في الصلاحيات
```bash
# إعادة تعيين الصلاحيات
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### مسح Cache
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
```
