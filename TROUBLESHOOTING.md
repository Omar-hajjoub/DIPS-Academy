# حل المشاكل - DIPS Academy

## 🔧 المشاكل الشائعة والحلول

### 1. مشكلة: "unexpected end of JSON input" عند تشغيل Docker

**السبب:** مشكلة في الاتصال بـ Docker Hub أو تحميل الصور

**الحلول:**

#### الحل 1: إعادة تشغيل Docker Desktop
```bash
# أغلق Docker Desktop تماماً
# ثم افتحه مرة أخرى
# انتظر حتى يظهر "Docker Desktop is running"
```

#### الحل 2: تنظيف Docker
```bash
# في PowerShell أو CMD
docker system prune -a
docker-compose down -v
```

#### الحل 3: تحميل الصور يدوياً
```bash
cd dips-academy
docker pull php:8.2-fpm
docker pull nginx:alpine
docker pull mysql:8.0
docker pull redis:7-alpine
docker pull phpmyadmin/phpmyadmin
```

#### الحل 4: استخدام Laragon بدلاً من Docker

إذا استمرت المشكلة، يمكنك استخدام Laragon مباشرة:

```bash
# 1. تأكد من أن Laragon يعمل
# 2. افتح Terminal في Laragon
# 3. انتقل إلى مجلد المشروع
cd C:\laragon\www\dips-acdayme\dips-academy

# 4. تثبيت المكتبات
composer install
npm install

# 5. إعداد البيئة
copy .env.example .env
php artisan key:generate

# 6. إعداد قاعدة البيانات في Laragon
# - أنشئ قاعدة بيانات باسم: dips_academy
# - عدّل .env:
#   DB_HOST=127.0.0.1
#   DB_DATABASE=dips_academy
#   DB_USERNAME=root
#   DB_PASSWORD=

# 7. تشغيل Migrations
php artisan migrate --seed

# 8. نشر ملفات Filament و Spatie
php artisan filament:install --panels
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# 9. بناء Assets
npm run build

# 10. تشغيل المشروع
php artisan serve
```

### 2. مشكلة: Ports مستخدمة

**الحل:** غيّر المنافذ في `docker-compose.yml`:

```yaml
nginx:
  ports:
    - "8001:80"  # بدلاً من 8000

phpmyadmin:
  ports:
    - "8081:80"  # بدلاً من 8080
```

### 3. مشكلة: Permission denied

**الحل:**
```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### 4. مشكلة: Database connection failed

**الحل:**
1. تحقق من أن MySQL container يعمل:
   ```bash
   docker-compose ps
   ```

2. تحقق من إعدادات `.env`:
   ```
   DB_HOST=db
   DB_DATABASE=dips_academy
   DB_USERNAME=dips_user
   DB_PASSWORD=root
   ```

3. إعادة تشغيل MySQL:
   ```bash
   docker-compose restart db
   ```

## 📝 ملاحظات

- تأكد من أن Docker Desktop يعمل قبل تشغيل الأوامر
- إذا استمرت المشاكل، استخدم Laragon مباشرة (أسهل في Windows)
- جميع الأوامر يجب تنفيذها من مجلد المشروع
