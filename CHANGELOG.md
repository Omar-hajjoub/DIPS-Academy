# Changelog / سجل التغييرات

جميع التغييرات المهمة في المشروع سيتم توثيقها في هذا الملف.  
Toutes les modifications importantes du projet seront documentées dans ce fichier.

## [1.0.1] - 2026-01-22

### 🌍 Ajouté / Added / إضافات

#### Support multilingue / دعم متعدد اللغات
- ✨ Ajout du support français et arabe dans toute la documentation / إضافة دعم الفرنسية والعربية في جميع التوثيق
- ✨ `install.php` maintenant bilingue (FR/AR) avec détection Windows / install.php ثنائي اللغة مع اكتشاف Windows
- ✨ `README_FR_AR.md` - README complet en français et arabe / README كامل بالفرنسية والعربية
- ✨ `INSTALLATION_FR_AR.md` - Guide d'installation bilingue détaillé / دليل التثبيت ثنائي اللغة مفصل
- ✨ `QUICK_INSTALL.md` - Installation rapide en 3 étapes / التثبيت السريع في 3 خطوات

#### Améliorations du script d'installation / تحسينات سكريبت التثبيت
- ✅ Détection automatique du système d'exploitation (Windows/Unix) / اكتشاف تلقائي لنظام التشغيل
- ✅ Vérification des extensions PHP requises / التحقق من امتدادات PHP المطلوبة
- ✅ Configuration automatique de l'encodage UTF-8 pour Windows / إعداد تلقائي لترميز UTF-8 في Windows
- ✅ Messages d'erreur détaillés et multilingues / رسائل خطأ مفصلة ومتعددة اللغات
- ✅ Support de Node.js optionnel / دعم Node.js اختياري
- ✅ Optimisation automatique du cache / تحسين تلقائي للذاكرة المؤقتة

#### Documentation bilingue / توثيق ثنائي اللغة
- 📚 Commentaires de code en français et arabe / تعليقات الكود بالفرنسية والعربية
- 📚 Seeders avec commentaires bilingues / Seeders مع تعليقات ثنائية اللغة
- 📚 Migrations documentées / Migrations موثقة

### 🔧 Fixed / Corrections / إصلاحات

#### CI/CD
- 🐛 Résolution des échecs de tests GitHub Actions / حل فشل اختبارات GitHub Actions
- 🐛 Configuration de `phpunit.xml` pour utiliser MySQL au lieu de SQLite / تكوين phpunit.xml لاستخدام MySQL بدلاً من SQLite
- 🐛 Ajout de vérifications de colonnes dans les migrations / إضافة فحوصات الأعمدة في الترحيلات
- 🐛 Correction du nom des index dans `down()` migration / تصحيح أسماء الفهارس في down() migration

#### Installation
- 🔧 Correction des problèmes d'installation sur les nouvelles machines / إصلاح مشاكل التثبيت على الأجهزة الجديدة
- 🔧 Amélioration de la gestion des erreurs / تحسين معالجة الأخطاء
- 🔧 Support amélioré pour Laragon/XAMPP/WAMP / دعم محسّن لـ Laragon/XAMPP/WAMP

### 📝 Changed / Modifications / تغييرات

#### Migrations
- 🔄 Amélioration de `2026_01_22_105926_add_tenant_user_id_to_tables.php` / تحسين
  - Vérification d'existence des colonnes avant ajout / التحقق من وجود الأعمدة قبل الإضافة
  - Gestion correcte des index lors du rollback / إدارة صحيحة للفهارس عند الإلغاء
  - Commentaires bilingues / تعليقات ثنائية اللغة

#### Configuration
- ⚙️ `phpunit.xml` configuré pour MySQL (cohérence avec CI) / مضبوط على MySQL (اتساق مع CI)
- ⚙️ Amélioration de la configuration de base de données pour les tests / تحسين إعداد قاعدة البيانات للاختبارات

### 🎨 Amélioré / Improved / تحسينات

#### Expérience utilisateur / تجربة المستخدم
- 💅 Interface d'installation plus claire et informative / واجهة تثبيت أوضح وأكثر إفادة
- 💅 Messages d'erreur plus descriptifs / رسائل خطأ أكثر وصفاً
- 💅 Barre de progression visuelle pendant l'installation / شريط تقدم مرئي أثناء التثبيت
- 💅 Emoji pour une meilleure lisibilité / رموز تعبيرية لقراءة أفضل

#### Performance / الأداء
- ⚡ Optimisation automatique après installation / تحسين تلقائي بعد التثبيت
- ⚡ Mise en cache des configurations / تخزين الإعدادات مؤقتاً

---

## [1.0.0] - 2026-01-22

### ✨ Added (إضافات جديدة)

#### نظام Multi-Tenant
- إضافة نظام Multi-Tenant كامل للسماح بقاعدة بيانات مستقلة لكل مستخدم
- خدمة `TenantDatabaseService` لإدارة قواعد البيانات المتعددة
- Middleware `SetTenantDatabase` للتبديل التلقائي بين قواعد البيانات
- أمر Artisan `tenant:create` لإنشاء قاعدة بيانات جديدة
- أمر Artisan `tenant:sync` لمزامنة البيانات مع القاعدة الرئيسية

#### التوثيق
- `README.md` - نظرة عامة شاملة عن المشروع
- `INSTALLATION.md` - دليل تثبيت مفصل خطوة بخطوة
- `MULTI_TENANT_GUIDE.md` - دليل استخدام نظام Multi-Tenant
- `QUICK_START_MYSQL_TENANT.md` - دليل بدء سريع
- `README_MYSQL_CONVERSION.md` - تقرير التحويل إلى MySQL
- `CONTRIBUTING.md` - دليل المساهمة في المشروع
- `CHANGELOG.md` - هذا الملف
- `LICENSE` - ترخيص MIT

#### سكريبتات التثبيت
- `install.php` - سكريبت تثبيت تلقائي لـ Windows/Laragon
- `install.sh` - سكريبت تثبيت تلقائي لـ Unix/Linux/macOS

#### الميزات الأساسية
- نظام إدارة الدورات التدريبية
- نظام إدارة الدروس والمحتوى
- نظام الاختبارات التفاعلية
- نظام الشهادات التلقائية
- نظام الصلاحيات (Super Admin, Admin, Instructor, Student)
- لوحة تحكم Filament قوية
- تسجيل الطلاب في الدورات
- تتبع تقدم الطلاب
- نظام التقييمات والمراجعات

### 🔄 Changed (تغييرات)

#### قاعدة البيانات
- تحويل قاعدة البيانات من SQLite إلى MySQL
- إضافة حقل `tenant_user_id` لجميع الجداول الرئيسية:
  - courses
  - lessons
  - enrollments
  - certificates
  - reviews
  - quizzes
  - quiz_questions
  - quiz_attempts
  - lesson_progress
- تحديث `.env.example` ليستخدم MySQL كإعداد افتراضي

#### الإعدادات
- تحديث اسم التطبيق في `.env.example` إلى "DIPS Academy"
- تحديث إعدادات الاتصال بقاعدة البيانات
- إضافة دعم لاتصالات قواعد البيانات الديناميكية

### 🗄️ Database Schema

#### الجداول الرئيسية (23 جدول)
```
- users                   المستخدمون
- roles                   الأدوار
- permissions             الصلاحيات
- model_has_roles         ربط النماذج بالأدوار
- model_has_permissions   ربط النماذج بالصلاحيات
- role_has_permissions    ربط الأدوار بالصلاحيات
- courses                 الدورات
- lessons                 الدروس
- enrollments             التسجيلات
- certificates            الشهادات
- reviews                 التقييمات
- quizzes                 الاختبارات
- quiz_questions          أسئلة الاختبارات
- quiz_attempts           محاولات الاختبارات
- lesson_progress         تقدم الدروس
- sessions                الجلسات
- cache                   الذاكرة المؤقتة
- cache_locks             قفل الذاكرة المؤقتة
- jobs                    المهام
- job_batches             مجموعات المهام
- failed_jobs             المهام الفاشلة
- password_reset_tokens   رموز إعادة تعيين كلمة المرور
- migrations              سجل Migrations
```

### 🚀 التبعيات

#### PHP (Composer)
- Laravel Framework 11.x
- Filament 3.x
- Spatie Laravel Permission 6.x
- Laravel Sanctum 4.x

#### JavaScript (NPM)
- Vite
- Tailwind CSS
- Alpine.js
- PostCSS

### 📦 البيانات الأولية (Seeders)

#### المستخدمون (14 مستخدم)
- 1 Super Admin
- 1 Admin
- 2 Instructors (مدرسين)
- 10 Students (طلاب)

#### الأدوار (4 أدوار)
- Super Admin - صلاحيات كاملة
- Admin - إدارة النظام
- Instructor - إدارة الدورات
- Student - الوصول للدورات

#### الدورات
- دورات تجريبية مع دروس واختبارات

### 🧪 الاختبارات

- اختبار الاتصال بـ MySQL: ✅
- اختبار Migrations: ✅
- اختبار Seeders: ✅
- اختبار إنشاء قاعدة بيانات Multi-Tenant: ✅
- اختبار المزامنة: ✅

### 📊 الإحصائيات

- **الملفات المضافة**: 15 ملف
- **الأسطر المضافة**: 2400+ سطر
- **التوثيق**: 6 ملفات
- **الأوامر الجديدة**: 2
- **الخدمات الجديدة**: 1
- **Middleware الجديدة**: 1

### 🔗 الروابط

- **GitHub Repository**: https://github.com/Omar-hajjoub/DIPS-Academy
- **Live Demo**: قريباً
- **Documentation**: انظر README.md

### 👥 المساهمون

- OMAR HAJJOUB (@Omar-hajjoub) - مطور رئيسي

---

## [Unreleased] - قريباً

### Planned (مخطط لها)

#### v1.1.0
- [ ] RESTful API كامل
- [ ] تطبيق موبايل (Flutter)
- [ ] نظام دفع متكامل (Stripe, PayPal)
- [ ] بث مباشر للدروس (WebRTC)
- [ ] نظام محادثة فورية
- [ ] إشعارات Push
- [ ] تقارير متقدمة مع رسوم بيانية
- [ ] نظام الواجبات المنزلية
- [ ] منتدى نقاش للدورات
- [ ] نظام التقييم الأوتوماتيكي

#### v1.2.0
- [ ] دعم متعدد اللغات (i18n)
- [ ] نظام الحجوزات والمواعيد
- [ ] تكامل مع Zoom/Google Meet
- [ ] محرر محتوى متقدم
- [ ] نظام الألعاب (Gamification)
- [ ] شارات وإنجازات
- [ ] لوحة قيادة متقدمة
- [ ] تصدير التقارير (PDF, Excel)

---

## النماذج

### Added (إضافات)
```markdown
- إضافة ميزة X
- إضافة دعم لـ Y
```

### Changed (تغييرات)
```markdown
- تحديث ميزة X
- تحسين أداء Y
```

### Fixed (إصلاحات)
```markdown
- إصلاح مشكلة X
- حل خطأ Y
```

### Deprecated (مهجور)
```markdown
- تم إهمال دالة X
- سيتم إزالة Y في الإصدار القادم
```

### Removed (محذوف)
```markdown
- إزالة ميزة قديمة X
- حذف كود غير مستخدم Y
```

### Security (أمان)
```markdown
- إصلاح ثغرة أمنية X
- تحديث أمني لـ Y
```

---

## ملاحظات

يتبع هذا المشروع [Semantic Versioning](https://semver.org/):
- **MAJOR** (v1.0.0): تغييرات غير متوافقة مع الإصدارات السابقة
- **MINOR** (v1.1.0): إضافة ميزات جديدة بطريقة متوافقة
- **PATCH** (v1.0.1): إصلاحات أخطاء متوافقة

---

**آخر تحديث**: 22 يناير 2026
