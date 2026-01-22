# 🎓 DIPS Academy - Guide d'Installation / دليل التثبيت

## 📋 Table des matières / جدول المحتويات

- [Prérequis / المتطلبات الأساسية](#prérequis--المتطلبات-الأساسية)
- [Installation Automatique / التثبيت التلقائي](#installation-automatique--التثبيت-التلقائي)
- [Installation Manuelle / التثبيت اليدوي](#installation-manuelle--التثبيت-اليدوي)
- [Résolution de problèmes / حل المشاكل](#résolution-de-problèmes--حل-المشاكل)

---

## 🔧 Prérequis / المتطلبات الأساسية

### Logiciels requis / البرامج المطلوبة

| Logiciel | Version Minimale | Téléchargement |
|----------|------------------|----------------|
| PHP | 8.2+ | [php.net](https://www.php.net/) |
| Composer | 2.0+ | [getcomposer.org](https://getcomposer.org/) |
| MySQL | 8.0+ | [mysql.com](https://www.mysql.com/) |
| Node.js | 18+ | [nodejs.org](https://nodejs.org/) |

### Extensions PHP requises / امتدادات PHP المطلوبة

```
✓ pdo
✓ mbstring
✓ fileinfo
✓ openssl
✓ tokenizer
✓ xml
✓ curl
✓ zip
✓ gd
✓ bcmath
```

### Vérifier les extensions / التحقق من الامتدادات

```bash
php -m
```

---

## 🚀 Installation Automatique / التثبيت التلقائي

### Windows (Laragon / XAMPP / WAMP)

1. **Cloner le projet / استنساخ المشروع**
   ```bash
   git clone https://github.com/Omar-hajjoub/DIPS-Academy.git
   cd DIPS-Academy
   ```

2. **Exécuter le script d'installation / تشغيل سكريبت التثبيت**
   ```bash
   php install.php
   ```

3. **Suivre les instructions / اتبع التعليمات**
   - Le script va installer automatiquement toutes les dépendances
   - سيقوم السكريبت بتثبيت جميع التبعيات تلقائياً
   
4. **Démarrer le serveur / تشغيل الخادم**
   - Si vous avez répondu "y" au script, le serveur démarre automatiquement
   - إذا أجبت "y" للسكريبت، سيبدأ الخادم تلقائياً
   - Sinon / وإلا: `php artisan serve`

### Linux / macOS

1. **Cloner le projet / استنساخ المشروع**
   ```bash
   git clone https://github.com/Omar-hajjoub/DIPS-Academy.git
   cd DIPS-Academy
   ```

2. **Rendre le script exécutable / جعل السكريبت قابلاً للتنفيذ**
   ```bash
   chmod +x install.sh
   ```

3. **Exécuter le script / تشغيل السكريبت**
   ```bash
   ./install.sh
   ```

---

## 🔨 Installation Manuelle / التثبيت اليدوي

Si le script automatique ne fonctionne pas / إذا لم يعمل السكريبت التلقائي:

### Étape 1 / الخطوة 1: Dépendances PHP

```bash
composer install --no-interaction --prefer-dist
```

### Étape 2 / الخطوة 2: Fichier d'environnement

```bash
# Copier le fichier / نسخ الملف
cp .env.example .env

# Générer la clé / توليد المفتاح
php artisan key:generate
```

### Étape 3 / الخطوة 3: Configurer la base de données

Ouvrir `.env` et modifier / افتح `.env` وعدل:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dips_academy
DB_USERNAME=root
DB_PASSWORD=
```

### Étape 4 / الخطوة 4: Créer la base de données

**MySQL:**
```sql
CREATE DATABASE dips_academy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

**Ou via phpMyAdmin / أو عبر phpMyAdmin:**
- Créer une nouvelle base de données nommée `dips_academy`
- أنشئ قاعدة بيانات جديدة باسم `dips_academy`

### Étape 5 / الخطوة 5: Migrations

```bash
php artisan migrate --seed
```

### Étape 6 / الخطوة 6: Filament

```bash
php artisan filament:install --panels -n
```

### Étape 7 / الخطوة 7: Liaison du stockage

```bash
php artisan storage:link
```

### Étape 8 / الخطوة 8: Dépendances JavaScript (optionnel)

```bash
npm install
npm run build
```

### Étape 9 / الخطوة 9: Optimisation

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Étape 10 / الخطوة 10: Démarrer le serveur

```bash
php artisan serve
```

---

## 🌐 Accès à l'application / الوصول إلى التطبيق

| Type | URL |
|------|-----|
| Site principal / الموقع الرئيسي | http://localhost:8000 |
| Tableau de bord / لوحة التحكم | http://localhost:8000/admin |
| Avec Laragon / مع Laragon | http://dips-academy.test |

### Identifiants par défaut / بيانات الدخول الافتراضية

#### Super Admin
- **Email / البريد:** superadmin@dips-academy.com
- **Mot de passe / كلمة المرور:** password

#### Admin
- **Email / البريد:** admin@dips-academy.com
- **Mot de passe / كلمة المرور:** password

#### Instructeur / مدرس
- **Email / البريد:** instructor1@dips-academy.com
- **Mot de passe / كلمة المرور:** password

---

## 🔧 Résolution de problèmes / حل المشاكل

### Problème 1: Composer n'est pas reconnu / Composer غير معروف

**Solution:**
```bash
# Vérifier l'installation / التحقق من التثبيت
composer --version

# Si non installé, télécharger depuis / إذا لم يكن مثبتاً، حمّل من:
# https://getcomposer.org/download/
```

### Problème 2: Extensions PHP manquantes / امتدادات PHP مفقودة

**Solution pour Laragon:**
1. Menu Laragon → PHP → Extensions
2. Activer les extensions requises / فعّل الامتدادات المطلوبة
3. Redémarrer Laragon / أعد تشغيل Laragon

**Solution pour XAMPP:**
1. Ouvrir `php.ini`
2. Décommenter les lignes (retirer `;`) / احذف الفاصلة المنقوطة:
   ```ini
   extension=curl
   extension=fileinfo
   extension=gd
   extension=mbstring
   extension=openssl
   extension=pdo_mysql
   ```
3. Redémarrer Apache / أعد تشغيل Apache

### Problème 3: Erreur de connexion à la base de données / خطأ الاتصال بقاعدة البيانات

**Solution:**
1. Vérifier que MySQL est démarré / تأكد من تشغيل MySQL
2. Vérifier les identifiants dans `.env` / تحقق من البيانات في `.env`
3. Créer la base de données manuellement / أنشئ قاعدة البيانات يدوياً

### Problème 4: Erreur 500 après installation / خطأ 500 بعد التثبيت

**Solution:**
```bash
# Vider le cache / حذف الذاكرة المؤقتة
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Régénérer le cache / إعادة توليد الذاكرة المؤقتة
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Vérifier les permissions / التحقق من الصلاحيات
chmod -R 755 storage bootstrap/cache
```

### Problème 5: Node.js non installé / Node.js غير مثبت

**Ce n'est pas critique / هذا ليس خطأً حرجاً**

L'application fonctionnera sans Node.js, mais avec une interface basique.
سيعمل التطبيق بدون Node.js، لكن بواجهة أساسية.

Pour une meilleure expérience / للحصول على تجربة أفضل:
1. Installer Node.js / ثبّت Node.js: https://nodejs.org/
2. Exécuter / شغّل: `npm install && npm run build`

### Problème 6: Erreur "Class not found" / خطأ "الفئة غير موجودة"

**Solution:**
```bash
# Régénérer l'autoload / إعادة توليد الأوتولود
composer dump-autoload

# Vider tous les caches / حذف جميع الذاكرات المؤقتة
php artisan optimize:clear

# Si le problème persiste / إذا استمرت المشكلة
composer install --optimize-autoloader
```

---

## 📞 Support / الدعم

- **GitHub Issues:** https://github.com/Omar-hajjoub/DIPS-Academy/issues
- **Documentation:** README.md
- **Email:** support@dips-academy.com

---

## 🎉 Prochaines étapes / الخطوات التالية

1. **Lire la documentation / اقرأ التوثيق**
   - `README.md` - Vue d'ensemble / نظرة عامة
   - `MULTI_TENANT_GUIDE.md` - Guide multi-tenant / دليل المستأجرين المتعددين
   - `TEAM_WORKFLOW.md` - Flux de travail / سير العمل

2. **Explorer l'application / استكشف التطبيق**
   - Se connecter au tableau de bord / سجل الدخول إلى لوحة التحكم
   - Créer un cours / أنشئ دورة
   - Ajouter des leçons / أضف دروساً

3. **Développer / طوّر**
   - Lire le code / اقرأ الكود
   - Créer de nouvelles fonctionnalités / أنشئ ميزات جديدة
   - Contribuer au projet / ساهم في المشروع

---

## 📝 Notes importantes / ملاحظات هامة

- ⚠️ **Ne jamais / لا تستخدم أبداً** utiliser `password` en production / في الإنتاج
- 🔐 Changer tous les mots de passe par défaut / غيّر جميع كلمات المرور الافتراضية
- 🔒 Configurer HTTPS en production / اضبط HTTPS في الإنتاج
- 📊 Sauvegarder régulièrement la base de données / احفظ قاعدة البيانات بانتظام
- 🔄 Mettre à jour régulièrement les dépendances / حدّث التبعيات بانتظام

---

**Créé avec ❤️ par / صُنع بحب بواسطة OMAR HAJJOUB**

🎓 **DIPS Academy - Excellence en Formation / التميز في التعليم**
