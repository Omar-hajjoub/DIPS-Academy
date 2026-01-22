# 📦 دليل التثبيت الشامل - DIPS Academy

هذا الدليل يشرح خطوات تثبيت المشروع بالتفصيل على أي جهاز.

---

## 📋 المتطلبات الأساسية

### 1. البرامج المطلوبة

#### على Windows:
- **[Laragon](https://laragon.org/download/)** (يتضمن PHP, MySQL, Apache)
  - أو **[XAMPP](https://www.apachefriends.org/)**
- **[Composer](https://getcomposer.org/download/)**
- **[Node.js](https://nodejs.org/)** (LTS version)
- **[Git](https://git-scm.com/download/win)**

#### على macOS:
```bash
# استخدم Homebrew
brew install php@8.2
brew install composer
brew install mysql
brew install node
brew install git
```

#### على Linux (Ubuntu/Debian):
```bash
# تثبيت PHP والامتدادات المطلوبة
sudo apt update
sudo apt install php8.2 php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath

# تثبيت Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# تثبيت MySQL
sudo apt install mysql-server

# تثبيت Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# تثبيت Git
sudo apt install git
```

### 2. التحقق من الإصدارات

بعد التثبيت، تحقق من الإصدارات:

```bash
php -v        # يجب أن يكون >= 8.2
composer -V   # أحدث إصدار
node -v       # يجب أن يكون >= 18.x
npm -v        # يأتي مع Node.js
mysql --version  # يجب أن يكون >= 8.0
git --version    # أي إصدار حديث
```

---

## 🚀 خطوات التثبيت

### الطريقة 1: التثبيت التلقائي (موصى به)

#### Windows (Laragon):

1. **افتح Terminal في Laragon**:
   ```bash
   # اذهب إلى مجلد www
   cd C:\laragon\www
   
   # استنسخ المشروع
   git clone https://github.com/YOUR_USERNAME/dips-academy.git
   cd dips-academy
   
   # شغّل سكريبت التثبيت
   php install.php
   ```

2. **تصفح الموقع**:
   - افتح المتصفح واذهب إلى: `http://dips-academy.test`
   - لوحة التحكم: `http://dips-academy.test/admin`

#### macOS/Linux:

```bash
# استنسخ المشروع
git clone https://github.com/YOUR_USERNAME/dips-academy.git
cd dips-academy

# أعطِ صلاحيات التنفيذ
chmod +x install.sh

# شغّل سكريبت التثبيت
./install.sh

# شغّل الخادم
php artisan serve
```

الموقع سيكون متاحاً على: `http://localhost:8000`

---

### الطريقة 2: التثبيت اليدوي (خطوة بخطوة)

#### الخطوة 1: استنساخ المشروع

```bash
# على Windows (Laragon)
cd C:\laragon\www
git clone https://github.com/YOUR_USERNAME/dips-academy.git
cd dips-academy

# على macOS/Linux
cd ~/Projects  # أو أي مجلد تفضله
git clone https://github.com/YOUR_USERNAME/dips-academy.git
cd dips-academy
```

#### الخطوة 2: تثبيت تبعيات PHP

```bash
composer install
```

**إذا واجهت مشاكل**:
```bash
composer install --ignore-platform-reqs
# أو
composer update
```

#### الخطوة 3: تثبيت تبعيات JavaScript

```bash
npm install
```

**إذا واجهت مشاكل**:
```bash
npm install --legacy-peer-deps
# أو
npm cache clean --force
npm install
```

#### الخطوة 4: إعداد ملف البيئة

```bash
# نسخ ملف المثال
cp .env.example .env

# على Windows
copy .env.example .env
```

**عدّل ملف `.env`**:

```env
APP_NAME="DIPS Academy"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://dips-academy.test  # أو http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dips_academy
DB_USERNAME=root
DB_PASSWORD=                      # اتركه فارغاً للـ Laragon

CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

#### الخطوة 5: توليد مفتاح التطبيق

```bash
php artisan key:generate
```

#### الخطوة 6: إنشاء قاعدة البيانات

**الطريقة 1: من Terminal**
```bash
# تسجيل الدخول إلى MySQL
mysql -u root -p

# إنشاء قاعدة البيانات
CREATE DATABASE dips_academy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**الطريقة 2: من phpMyAdmin**
- افتح `http://localhost/phpmyadmin`
- أنشئ قاعدة بيانات جديدة باسم `dips_academy`
- اختر: `utf8mb4_unicode_ci`

**الطريقة 3: باستخدام Artisan**
```bash
php artisan db:create
```

#### الخطوة 7: تشغيل Migrations

```bash
# تشغيل Migrations مع البيانات الأولية
php artisan migrate --seed
```

هذا سينشئ:
- 23 جدول في قاعدة البيانات
- 4 أدوار (Super Admin, Admin, Instructor, Student)
- 14 مستخدم تجريبي
- دورات تجريبية

#### الخطوة 8: نشر ملفات Filament

```bash
php artisan filament:install --panels
```

#### الخطوة 9: إعداد التخزين

```bash
php artisan storage:link
```

#### الخطوة 10: بناء Assets

```bash
# للتطوير
npm run dev

# للإنتاج
npm run build
```

#### الخطوة 11: تشغيل المشروع

**مع Laragon**:
- لا حاجة لأي شيء، فقط اذهب إلى: `http://dips-academy.test`

**بدون Laragon**:
```bash
php artisan serve
```
- اذهب إلى: `http://localhost:8000`

---

## 🧪 اختبار التثبيت

### 1. تحقق من الصفحة الرئيسية

افتح المتصفح واذهب إلى:
- `http://dips-academy.test` (Laragon)
- `http://localhost:8000` (بدون Laragon)

### 2. تسجيل الدخول إلى لوحة التحكم

اذهب إلى: `/admin`

**بيانات الدخول**:
| الدور | البريد | كلمة المرور |
|-------|--------|-------------|
| Super Admin | superadmin@dips-academy.com | password |
| Admin | admin@dips-academy.com | password |
| Instructor | instructor1@dips-academy.com | password |
| Student | student1@dips-academy.com | password |

### 3. اختبار نظام Multi-Tenant

```bash
# إنشاء قاعدة بيانات للمستخدم 1
php artisan tenant:create 1

# التحقق من إنشائها
php artisan db:show
```

---

## 🔧 إعدادات إضافية

### 1. تفعيل Middleware للـ Multi-Tenant

عدّل `bootstrap/app.php`:

```php
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'tenant' => \App\Http\Middleware\SetTenantDatabase::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
```

### 2. إعداد البريد الإلكتروني (اختياري)

في `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="hello@dips-academy.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. جدولة المهام (اختياري)

**Windows (Task Scheduler)**:
```bash
# أضف مهمة جديدة تشغل كل دقيقة:
C:\laragon\bin\php\php-8.2-Win32\php.exe C:\laragon\www\dips-academy\artisan schedule:run
```

**Linux/macOS (Cron)**:
```bash
# افتح crontab
crontab -e

# أضف:
* * * * * cd /path/to/dips-academy && php artisan schedule:run >> /dev/null 2>&1
```

---

## 🐛 حل المشاكل الشائعة

### مشكلة 1: "Class not found"

**الحل**:
```bash
composer dump-autoload
php artisan clear-compiled
php artisan optimize:clear
```

### مشكلة 2: "Permission denied"

**الحل (Linux/macOS)**:
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

**الحل (Windows)**:
- كليك يمين على مجلد `storage` → Properties → Security
- أعطِ Full Control للمستخدم الحالي

### مشكلة 3: "Mix manifest not found"

**الحل**:
```bash
npm install
npm run build
```

### مشكلة 4: "SQLSTATE[HY000] [2002] Connection refused"

**الحل**:
```bash
# تأكد من تشغيل MySQL
# على Windows (Laragon): شغّل MySQL من لوحة Laragon
# على Linux:
sudo service mysql start
# على macOS:
brew services start mysql
```

### مشكلة 5: "Access denied for user"

**الحل**:
- تحقق من بيانات الاتصال في `.env`
- تأكد من صحة اسم المستخدم وكلمة المرور

```bash
# اختبار الاتصال بـ MySQL
mysql -u root -p
```

### مشكلة 6: مشاكل في Composer

**الحل**:
```bash
# مسح الكاش
composer clear-cache

# إعادة التثبيت
rm -rf vendor
composer install

# على Windows
rmdir /s /q vendor
composer install
```

### مشكلة 7: Port 80 محجوز

**الحل**:
```bash
# استخدم port مختلف
php artisan serve --port=8080
```

---

## 📦 التبعيات المطلوبة

### تبعيات PHP (composer.json)

```json
{
    "require": {
        "php": "^8.2",
        "filament/filament": "^3.0",
        "laravel/framework": "^11.0",
        "laravel/sanctum": "^4.0",
        "spatie/laravel-permission": "^6.0"
    }
}
```

### تبعيات JavaScript (package.json)

```json
{
    "devDependencies": {
        "@tailwindcss/forms": "^0.5.2",
        "autoprefixer": "^10.4.2",
        "laravel-vite-plugin": "^1.0",
        "postcss": "^8.4.6",
        "tailwindcss": "^3.1.0",
        "vite": "^5.0"
    }
}
```

---

## ✅ قائمة التحقق النهائية

قبل البدء باستخدام المشروع، تأكد من:

- [ ] تم تثبيت جميع المتطلبات الأساسية
- [ ] تم استنساخ المشروع بنجاح
- [ ] تم تثبيت جميع التبعيات (composer + npm)
- [ ] تم إنشاء ملف `.env`
- [ ] تم توليد مفتاح التطبيق
- [ ] تم إنشاء قاعدة البيانات
- [ ] تم تشغيل Migrations بنجاح
- [ ] تم بناء Assets
- [ ] يمكن الوصول للموقع
- [ ] يمكن تسجيل الدخول إلى لوحة التحكم
- [ ] نظام Multi-Tenant يعمل

---

## 🎓 الخطوات التالية

بعد التثبيت الناجح:

1. **اقرأ التوثيق**:
   - [دليل Multi-Tenant](MULTI_TENANT_GUIDE.md)
   - [دليل البدء السريع](QUICK_START_MYSQL_TENANT.md)

2. **جرّب النظام**:
   ```bash
   # أنشئ قاعدة بيانات لمدرس
   php artisan tenant:create 3
   
   # سجل دخول كمدرس وأضف دورة
   # ثم زامن مع القاعدة الرئيسية
   php artisan tenant:sync 3
   ```

3. **خصص المشروع**:
   - عدّل الألوان والشعار
   - أضف دورات ومحتوى
   - خصص الواجهة حسب احتياجاتك

---

## 📞 الدعم

إذا واجهت أي مشاكل:

1. راجع قسم [حل المشاكل الشائعة](#-حل-المشاكل-الشائعة)
2. افتح [Issue على GitHub](https://github.com/YOUR_USERNAME/dips-academy/issues)
3. راسلنا على: omarstarsfre@gmail.com

---

**🎉 مبروك! تم تثبيت DIPS Academy بنجاح!**

استمتع باستخدام النظام 🚀
