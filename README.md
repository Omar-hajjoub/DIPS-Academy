# 🎓 DIPS Academy - نظام إدارة التعلم الإلكتروني

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange?style=for-the-badge&logo=mysql)
![Filament](https://img.shields.io/badge/Filament-3.x-yellow?style=for-the-badge)

**نظام متكامل لإدارة الدورات التدريبية والأكاديمية مع دعم Multi-Tenant**

[التثبيت](#-التثبيت) • [المميزات](#-المميزات) • [التوثيق](#-التوثيق) • [المساهمة](#-المساهمة)

</div>

---

## 📋 نظرة عامة

**DIPS Academy** هو نظام إدارة تعلم إلكتروني (LMS) متطور مبني باستخدام Laravel و Filament، يوفر تجربة تعليمية شاملة للطلاب والمدرسين.

### ✨ المميزات الرئيسية

#### 🎯 إدارة الدورات
- ✅ إنشاء وإدارة الدورات التدريبية
- ✅ دروس متعددة الوسائط (فيديو، نصوص، ملفات)
- ✅ نظام اختبارات تفاعلي
- ✅ تتبع تقدم الطلاب
- ✅ شهادات إنجاز تلقائية

#### 👥 إدارة المستخدمين
- ✅ نظام صلاحيات متقدم (Super Admin, Admin, Instructor, Student)
- ✅ تسجيل الطلاب في الدورات
- ✅ لوحة تحكم منفصلة لكل دور

#### 🗄️ نظام Multi-Tenant المتقدم
- ✅ **قاعدة بيانات مستقلة لكل مستخدم**
- ✅ عزل كامل للبيانات بين المستخدمين
- ✅ مزامنة تلقائية مع القاعدة الرئيسية
- ✅ أداء محسّن وسرعة استجابة عالية

#### 📊 التقارير والإحصائيات
- ✅ تقارير مفصلة عن أداء الطلاب
- ✅ إحصائيات الدورات والتسجيلات
- ✅ تقييمات ومراجعات الدورات

#### 🎨 واجهة مستخدم حديثة
- ✅ تصميم عصري وسهل الاستخدام
- ✅ لوحة تحكم Filament قوية
- ✅ متجاوب مع جميع الأجهزة

---

## 🚀 التثبيت

### المتطلبات الأساسية

قبل البدء، تأكد من توفر:

- **PHP**: >= 8.2
- **Composer**: أحدث إصدار
- **Node.js**: >= 18.x
- **MySQL**: >= 8.0
- **Git**

### طرق التثبيت

#### الطريقة 1: التثبيت السريع (مع Laragon)

```bash
# 1. استنساخ المشروع
git clone https://github.com/YOUR_USERNAME/dips-academy.git
cd dips-academy

# 2. تشغيل سكريبت التثبيت التلقائي
php install.php
```

#### الطريقة 2: التثبيت اليدوي

```bash
# 1. استنساخ المشروع
git clone https://github.com/YOUR_USERNAME/dips-academy.git
cd dips-academy

# 2. تثبيت التبعيات
composer install
npm install

# 3. إعداد ملف البيئة
cp .env.example .env

# 4. توليد مفتاح التطبيق
php artisan key:generate

# 5. إعداد قاعدة البيانات
# عدّل ملف .env وأضف بيانات MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=dips_academy
# DB_USERNAME=root
# DB_PASSWORD=

# 6. إنشاء قاعدة البيانات
php artisan db:create

# 7. تشغيل Migrations والبيانات الأولية
php artisan migrate --seed

# 8. نشر ملفات Filament
php artisan filament:install --panels

# 9. بناء Assets
npm run build

# 10. تشغيل الخادم (اختياري)
php artisan serve
```

### 📝 بيانات الدخول الافتراضية

| الدور | البريد الإلكتروني | كلمة المرور |
|-------|-------------------|-------------|
| Super Admin | superadmin@dips-academy.com | password |
| Admin | admin@dips-academy.com | password |
| Instructor | instructor1@dips-academy.com | password |
| Student | student1@dips-academy.com | password |

---

## 🗄️ نظام Multi-Tenant

### ما هو Multi-Tenant؟

يوفر النظام قاعدة بيانات مستقلة لكل مستخدم، مما يضمن:
- 🔒 **عزل كامل للبيانات**
- ⚡ **أداء محسّن**
- 📈 **قابلية توسع عالية**
- 🔄 **مزامنة سهلة مع القاعدة الرئيسية**

### الأوامر الأساسية

```bash
# إنشاء قاعدة بيانات لمستخدم
php artisan tenant:create {user_id}

# مزامنة بيانات المستخدم مع القاعدة الرئيسية
php artisan tenant:sync {user_id}

# مزامنة جداول محددة فقط
php artisan tenant:sync {user_id} --tables=courses --tables=lessons
```

**📖 للمزيد من التفاصيل، راجع:**
- [دليل Multi-Tenant الشامل](MULTI_TENANT_GUIDE.md)
- [دليل البدء السريع](QUICK_START_MYSQL_TENANT.md)
- [تقرير التحويل إلى MySQL](README_MYSQL_CONVERSION.md)

---

## 📁 هيكل المشروع

```
dips-academy/
├── app/
│   ├── Console/Commands/          # أوامر Artisan المخصصة
│   │   ├── CreateTenantDatabase.php
│   │   └── SyncTenantToMain.php
│   ├── Filament/                  # لوحة تحكم Filament
│   │   ├── Resources/
│   │   └── Pages/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   │       └── SetTenantDatabase.php
│   ├── Models/                    # نماذج Eloquent
│   │   ├── User.php
│   │   ├── Course.php
│   │   ├── Lesson.php
│   │   └── ...
│   └── Services/
│       └── TenantDatabaseService.php  # خدمة Multi-Tenant
├── database/
│   ├── migrations/                # ملفات Migration
│   └── seeders/                   # بيانات أولية
├── resources/
│   ├── views/                     # ملفات Blade
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── console.php
├── .env.example                   # مثال ملف البيئة
├── composer.json                  # تبعيات PHP
├── package.json                   # تبعيات Node.js
├── INSTALLATION.md                # دليل التثبيت المفصل
├── MULTI_TENANT_GUIDE.md          # دليل Multi-Tenant
└── README.md                      # هذا الملف
```

---

## 🛠️ التكنولوجيا المستخدمة

### Backend
- **Laravel 11.x** - إطار عمل PHP
- **MySQL 8.0+** - قاعدة البيانات
- **Spatie Laravel Permission** - إدارة الصلاحيات
- **Laravel Sanctum** - المصادقة

### Frontend
- **Filament 3.x** - لوحة تحكم إدارية
- **Tailwind CSS** - إطار عمل CSS
- **Alpine.js** - JavaScript Framework
- **Livewire** - مكونات تفاعلية

### DevOps
- **Git** - نظام التحكم بالإصدارات
- **Composer** - إدارة تبعيات PHP
- **NPM** - إدارة تبعيات JavaScript
- **Docker** - (اختياري) للحاويات

---

## 📚 التوثيق

### دلائل متاحة

1. **[INSTALLATION.md](INSTALLATION.md)** - دليل التثبيت الشامل خطوة بخطوة
2. **[MULTI_TENANT_GUIDE.md](MULTI_TENANT_GUIDE.md)** - دليل نظام Multi-Tenant
3. **[QUICK_START_MYSQL_TENANT.md](QUICK_START_MYSQL_TENANT.md)** - دليل البدء السريع
4. **[README_MYSQL_CONVERSION.md](README_MYSQL_CONVERSION.md)** - تقرير التحويل إلى MySQL
5. **[START_WITH_LARAGON.md](START_WITH_LARAGON.md)** - دليل استخدام Laragon

### API Documentation
قريباً: توثيق API كامل باستخدام Swagger/OpenAPI

---

## 🧪 الاختبار

```bash
# تشغيل الاختبارات
php artisan test

# تشغيل اختبارات محددة
php artisan test --filter=CourseTest

# تشغيل الاختبارات مع تقرير التغطية
php artisan test --coverage
```

---

## 🔧 إعدادات إضافية

### تفعيل Middleware للـ Multi-Tenant

في `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'tenant' => \App\Http\Middleware\SetTenantDatabase::class,
    ]);
})
```

في `routes/web.php`:

```php
Route::middleware(['auth', 'tenant'])->group(function () {
    Route::resource('courses', CourseController::class);
    // ... routes أخرى
});
```

### جدولة المهام التلقائية

في `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule)
{
    // مزامنة يومية للمستخدمين
    $schedule->command('tenant:sync 3')->daily();
    $schedule->command('tenant:sync 4')->daily();
}
```

---

## 🐛 استكشاف الأخطاء

### مشاكل شائعة وحلولها

#### خطأ: "Access denied for user"
```bash
# تحقق من إعدادات .env
DB_HOST=127.0.0.1
DB_USERNAME=root
DB_PASSWORD=
```

#### خطأ: "Class not found"
```bash
composer dump-autoload
php artisan clear-compiled
php artisan optimize:clear
```

#### خطأ: "Mix manifest not found"
```bash
npm install
npm run build
```

---

## 🤝 المساهمة

نرحب بمساهماتك! إذا كنت ترغب في المساهمة:

1. Fork المشروع
2. أنشئ فرع للميزة الجديدة (`git checkout -b feature/amazing-feature`)
3. Commit التغييرات (`git commit -m 'Add amazing feature'`)
4. Push إلى الفرع (`git push origin feature/amazing-feature`)
5. افتح Pull Request

### إرشادات المساهمة

- اتبع معايير كتابة كود Laravel
- أضف اختبارات للميزات الجديدة
- حدّث التوثيق عند الحاجة
- اكتب رسائل commit واضحة ومفصلة

---

## 📄 الترخيص

هذا المشروع مرخص تحت [MIT License](LICENSE).

---

## 👥 الفريق

- **OMAR HAJJOUB** - مطور رئيسي - [GitHub](https://github.com/omarstarsfre)

---

## 🙏 الشكر والتقدير

- [Laravel](https://laravel.com) - إطار العمل الرائع
- [Filament](https://filamentphp.com) - لوحة التحكم القوية
- [Spatie](https://spatie.be) - حزم Laravel المفيدة
- جميع المساهمين في المشروع

---

## 📞 التواصل والدعم

- **Email**: omarstarsfre@gmail.com
- **GitHub Issues**: [فتح issue جديد](https://github.com/YOUR_USERNAME/dips-academy/issues)

---

## 🗺️ خارطة الطريق

### النسخة الحالية (v1.0.0)
- ✅ نظام Multi-Tenant كامل
- ✅ إدارة الدورات والدروس
- ✅ نظام الاختبارات
- ✅ الشهادات التلقائية

### قادم قريباً (v1.1.0)
- 🔄 API RESTful كامل
- 🔄 تطبيق موبايل
- 🔄 نظام دفع متكامل
- 🔄 بث مباشر للدروس
- 🔄 نظام محادثة فورية

---

<div align="center">

**صُنع بـ ❤️ بواسطة فريق DIPS Academy**

⭐ إذا أعجبك المشروع، لا تنسَ منحه نجمة على GitHub!

[⬆ العودة إلى الأعلى](#-dips-academy---نظام-إدارة-التعلم-الإلكتروني)

</div>
