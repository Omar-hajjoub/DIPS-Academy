# دليل استخدام نظام قواعد البيانات المتعددة (Multi-Tenant)

## 📖 نظرة عامة

تم تحويل المشروع من SQLite إلى MySQL مع إضافة نظام قواعد بيانات متعددة حيث يمتلك كل مستخدم قاعدة بيانات خاصة به، مع إمكانية المزامنة مع القاعدة الرئيسية.

## 🔧 الإعداد

### 1. متطلبات النظام
- Laragon مع MySQL
- PHP 8.1 أو أحدث
- Composer

### 2. إعداد قاعدة البيانات الرئيسية
تم إنشاء قاعدة البيانات الرئيسية: `dips_academy`

إعدادات `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dips_academy
DB_USERNAME=root
DB_PASSWORD=
```

## 🚀 الاستخدام

### 1. إنشاء قاعدة بيانات لمستخدم جديد

#### عبر سطر الأوامر:
```bash
php artisan tenant:create USER_ID
```

مثال:
```bash
php artisan tenant:create 1
```

سيتم إنشاء قاعدة بيانات جديدة باسم: `dips_user_1`

#### عبر الكود:
```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);
$tenantService->createTenantDatabase('1');
```

### 2. التبديل بين قواعد البيانات

```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);

// التبديل إلى قاعدة بيانات المستخدم
$tenantService->switchToTenantDatabase('1');

// القيام بعمليات على قاعدة بيانات المستخدم
$courses = DB::table('courses')->get();

// الرجوع إلى القاعدة الرئيسية
$tenantService->switchToMainDatabase();
```

### 3. مزامنة البيانات مع القاعدة الرئيسية

#### مزامنة جميع الجداول:
```bash
php artisan tenant:sync USER_ID
```

#### مزامنة جداول محددة:
```bash
php artisan tenant:sync 1 --tables=courses --tables=lessons
```

#### عبر الكود:
```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);

// مزامنة جميع الجداول
$tenantService->syncToMainDatabase('1');

// مزامنة جداول محددة
$tenantService->syncToMainDatabase('1', ['courses', 'lessons']);
```

### 4. التحقق من وجود قاعدة بيانات للمستخدم

```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);

if ($tenantService->tenantDatabaseExists('1')) {
    echo "قاعدة البيانات موجودة";
} else {
    echo "قاعدة البيانات غير موجودة";
}
```

### 5. حذف قاعدة بيانات مستخدم

```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);
$tenantService->deleteTenantDatabase('1');
```

## 🔄 استخدام Middleware للتبديل التلقائي

يمكنك استخدام Middleware للتبديل التلقائي إلى قاعدة بيانات المستخدم:

### تسجيل Middleware:

في `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'tenant' => \App\Http\Middleware\SetTenantDatabase::class,
    ]);
})
```

### استخدام Middleware:

في ملف routes:
```php
Route::middleware(['auth', 'tenant'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('courses', CourseController::class);
});
```

## 📊 بنية قواعد البيانات

### القاعدة الرئيسية: `dips_academy`
- تحتوي على جميع البيانات المشتركة
- تحتوي على حقل `tenant_user_id` في كل جدول لتحديد صاحب البيانات

### قواعد بيانات المستخدمين: `dips_user_{ID}`
- قاعدة بيانات مستقلة لكل مستخدم
- نفس البنية الخاصة بالقاعدة الرئيسية
- يتم المزامنة مع القاعدة الرئيسية حسب الحاجة

## 📝 الجداول المدعومة

الجداول التي تدعم Multi-Tenant:
- `courses` - الدورات
- `lessons` - الدروس
- `enrollments` - التسجيلات
- `certificates` - الشهادات
- `reviews` - التقييمات
- `quizzes` - الاختبارات
- `quiz_questions` - أسئلة الاختبارات
- `quiz_attempts` - محاولات الاختبارات
- `lesson_progress` - تقدم الدروس

## 🛠️ أوامر Artisan المتاحة

| الأمر | الوصف |
|-------|-------|
| `php artisan tenant:create {user_id}` | إنشاء قاعدة بيانات جديدة لمستخدم |
| `php artisan tenant:sync {user_id}` | مزامنة بيانات المستخدم مع القاعدة الرئيسية |
| `php artisan tenant:sync {user_id} --tables=courses` | مزامنة جداول محددة فقط |

## 💡 أمثلة عملية

### مثال 1: إنشاء دورة في قاعدة بيانات المستخدم

```php
use App\Services\TenantDatabaseService;
use App\Models\Course;

$tenantService = app(TenantDatabaseService::class);
$userId = auth()->id();

// التبديل إلى قاعدة بيانات المستخدم
$tenantService->switchToTenantDatabase($userId);

// إنشاء الدورة
$course = Course::create([
    'title' => 'دورة PHP',
    'description' => 'دورة شاملة لتعلم PHP',
    'instructor_id' => $userId,
]);

// الرجوع إلى القاعدة الرئيسية
$tenantService->switchToMainDatabase();
```

### مثال 2: مزامنة الدورات مع القاعدة الرئيسية

```php
use App\Services\TenantDatabaseService;

$tenantService = app(TenantDatabaseService::class);
$userId = auth()->id();

// مزامنة جدول الدورات فقط
$tenantService->syncToMainDatabase($userId, ['courses']);
```

### مثال 3: عرض جميع الدورات من جميع المستخدمين (القاعدة الرئيسية)

```php
use App\Models\Course;

// تأكد من أنك متصل بالقاعدة الرئيسية
$allCourses = Course::all();

// أو عرض دورات مستخدم محدد
$userCourses = Course::where('tenant_user_id', '1')->get();
```

## ⚠️ ملاحظات هامة

1. **الأداء**: كل مستخدم له قاعدة بيانات مستقلة، مما يحسن الأداء ويعزل البيانات
2. **المزامنة**: يجب مزامنة البيانات يدوياً عند الحاجة
3. **النسخ الاحتياطي**: تأكد من عمل نسخ احتياطي لجميع قواعد البيانات
4. **الصلاحيات**: تأكد من أن مستخدم MySQL لديه صلاحيات إنشاء قواعد بيانات

## 🔐 الأمان

- كل مستخدم يرى فقط بياناته الخاصة
- البيانات معزولة تماماً بين المستخدمين
- يمكن التحكم في المزامنة والوصول للقاعدة الرئيسية

## 📞 الدعم

للمزيد من المعلومات أو الدعم، يرجى مراجعة الملفات التالية:
- `app/Services/TenantDatabaseService.php`
- `app/Console/Commands/CreateTenantDatabase.php`
- `app/Console/Commands/SyncTenantToMain.php`
- `app/Http/Middleware/SetTenantDatabase.php`
