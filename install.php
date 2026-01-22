<?php

/**
 * Script d'Installation Automatique pour DIPS Academy
 * سكريبت التثبيت التلقائي لمشروع DIPS Academy
 * 
 * Ce script installe automatiquement le projet avec toutes ses dépendances
 * يقوم هذا السكريبت بتثبيت المشروع تلقائياً مع جميع التبعيات
 */

// Définir l'encodage pour Windows / تعيين الترميز لويندوز
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    system('chcp 65001 > NUL 2>&1');
}

echo "\n";
echo "╔═══════════════════════════════════════════════════════════════════╗\n";
echo "║                                                                   ║\n";
echo "║  🎓 DIPS Academy - Installation Automatique / التثبيت التلقائي   ║\n";
echo "║                                                                   ║\n";
echo "╚═══════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// Vérification de PHP / التحقق من PHP
echo "📋 Vérification des prérequis / التحقق من المتطلبات الأساسية...\n\n";

$phpVersion = phpversion();
echo "✓ PHP Version: {$phpVersion}\n";

if (version_compare($phpVersion, '8.2.0', '<')) {
    echo "❌ Erreur: PHP 8.2 ou supérieur requis / خطأ: يتطلب PHP 8.2 أو أحدث\n";
    echo "   Version actuelle / النسخة الحالية: {$phpVersion}\n";
    exit(1);
}

// Vérification de Composer / التحقق من Composer
exec('composer -V 2>&1', $output, $return);
if ($return !== 0) {
    echo "❌ Erreur: Composer n'est pas installé / خطأ: Composer غير مثبت\n";
    echo "📥 Veuillez installer Composer depuis / يرجى تثبيت Composer من:\n";
    echo "   https://getcomposer.org/\n";
    exit(1);
}
echo "✓ Composer: Installé / مثبت\n";

// Vérification de Node / التحقق من Node
exec('node -v 2>&1', $output, $return);
if ($return !== 0) {
    echo "⚠️  Avertissement: Node.js n'est pas installé / تحذير: Node.js غير مثبت\n";
    echo "📥 Recommandé / يُنصح بتثبيت Node.js من: https://nodejs.org/\n";
    $hasNode = false;
} else {
    echo "✓ Node.js: Installé / مثبت\n";
    $hasNode = true;
}

// Vérification des extensions PHP requises / التحقق من امتدادات PHP المطلوبة
echo "\n📦 Vérification des extensions PHP / التحقق من امتدادات PHP:\n";
$requiredExtensions = ['pdo', 'mbstring', 'fileinfo', 'openssl', 'tokenizer', 'xml', 'curl', 'zip'];
$missingExtensions = [];

foreach ($requiredExtensions as $ext) {
    if (extension_loaded($ext)) {
        echo "  ✓ {$ext}\n";
    } else {
        echo "  ❌ {$ext} (manquant / مفقود)\n";
        $missingExtensions[] = $ext;
    }
}

if (!empty($missingExtensions)) {
    echo "\n❌ Extensions manquantes / امتدادات مفقودة: " . implode(', ', $missingExtensions) . "\n";
    echo "   Veuillez les activer dans php.ini / يرجى تفعيلها في php.ini\n";
    exit(1);
}

echo "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";

// Début de l'installation / بدء عملية التثبيت
echo "🚀 Démarrage de l'installation / بدء عملية التثبيت...\n\n";

// Étape 1: Installation des dépendances Composer / الخطوة 1: تثبيت تبعيات Composer
echo "📦 [1/9] Installation des dépendances PHP (Composer)\n";
echo "      تثبيت تبعيات PHP (Composer)...\n";
passthru('composer install --no-interaction --prefer-dist', $return);
if ($return !== 0) {
    echo "❌ Échec de l'installation des dépendances Composer\n";
    echo "   فشل تثبيت تبعيات Composer\n";
    exit(1);
}
echo "✅ Dépendances PHP installées avec succès / تم تثبيت تبعيات PHP بنجاح\n\n";

// Étape 2: Installation des dépendances NPM / الخطوة 2: تثبيت تبعيات NPM
if ($hasNode) {
    echo "📦 [2/9] Installation des dépendances JavaScript (NPM)\n";
    echo "      تثبيت تبعيات JavaScript (NPM)...\n";
    passthru('npm install 2>&1', $return);
    if ($return !== 0) {
        echo "⚠️  Avertissement: Problème possible avec NPM / تحذير: قد تكون هناك مشكلة في تثبيت NPM\n";
    } else {
        echo "✅ Dépendances JavaScript installées / تم تثبيت تبعيات JavaScript\n";
    }
} else {
    echo "⏭️  [2/9] Étape NPM ignorée (Node.js non installé)\n";
    echo "      تم تخطي خطوة NPM (Node.js غير مثبت)\n";
}
echo "\n";

// Étape 3: Copie du fichier .env / الخطوة 3: نسخ ملف .env
echo "⚙️  [3/9] Configuration du fichier d'environnement (.env)\n";
echo "      إعداد ملف البيئة (.env)...\n";
if (!file_exists('.env')) {
    if (file_exists('.env.example')) {
        copy('.env.example', '.env');
        echo "✅ Fichier .env créé depuis .env.example / تم نسخ .env.example إلى .env\n";
    } else {
        echo "❌ Erreur: Fichier .env.example introuvable / خطأ: ملف .env.example غير موجود\n";
        exit(1);
    }
} else {
    echo "ℹ️  Fichier .env déjà existant / ملف .env موجود بالفعل\n";
}
echo "\n";

// Étape 4: Génération de la clé d'application / الخطوة 4: توليد مفتاح التطبيق
echo "🔑 [4/9] Génération de la clé d'application / توليد مفتاح التطبيق...\n";
passthru('php artisan key:generate --force', $return);
if ($return !== 0) {
    echo "❌ Échec de la génération de la clé / فشل توليد مفتاح التطبيق\n";
    exit(1);
}
echo "✅ Clé d'application générée / تم توليد مفتاح التطبيق\n\n";

// Étape 5: Configuration de la base de données / الخطوة 5: إعداد قاعدة البيانات
echo "🗄️  [5/9] Configuration de la base de données / إعداد قاعدة البيانات...\n";
echo "ℹ️  Assurez-vous que MySQL est en cours d'exécution\n";
echo "    يرجى التأكد من تشغيل MySQL\n";

// Lecture des paramètres de la base de données / قراءة إعدادات قاعدة البيانات
$env = file_get_contents('.env');
preg_match('/DB_DATABASE=(.*)/', $env, $matches);
$dbName = trim($matches[1] ?? 'dips_academy');

preg_match('/DB_HOST=(.*)/', $env, $matches);
$dbHost = trim($matches[1] ?? '127.0.0.1');

preg_match('/DB_USERNAME=(.*)/', $env, $matches);
$dbUser = trim($matches[1] ?? 'root');

preg_match('/DB_PASSWORD=(.*)/', $env, $matches);
$dbPassword = trim($matches[1] ?? '');

echo "📊 Base de données / قاعدة البيانات: {$dbName}\n";
echo "🖥️  Hôte / المضيف: {$dbHost}\n";

// Tentative de création de la base de données / محاولة إنشاء قاعدة البيانات
try {
    $pdo = new PDO("mysql:host={$dbHost}", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Base de données créée / تم إنشاء قاعدة البيانات: {$dbName}\n";
} catch (PDOException $e) {
    echo "⚠️  Avertissement: Impossible de créer la base de données automatiquement\n";
    echo "    تحذير: لم يتم إنشاء قاعدة البيانات تلقائياً\n";
    echo "ℹ️  Veuillez créer manuellement la base de données / يرجى إنشاء قاعدة البيانات يدوياً:\n";
    echo "    Nom / الاسم: {$dbName}\n";
    echo "    Erreur / الخطأ: " . $e->getMessage() . "\n";
}
echo "\n";

// Étape 6: Exécution des Migrations / الخطوة 6: تشغيل Migrations
echo "🔄 [6/9] Exécution des Migrations / تشغيل Migrations...\n";
passthru('php artisan migrate --force --seed', $return);
if ($return !== 0) {
    echo "❌ Échec de l'exécution des Migrations / فشل تشغيل Migrations\n";
    echo "ℹ️  Vérifiez les paramètres de la base de données dans .env\n";
    echo "    يرجى التأكد من إعدادات قاعدة البيانات في .env\n";
    exit(1);
}
echo "✅ Migrations exécutées avec succès / تم تشغيل Migrations بنجاح\n\n";

// Étape 7: Publication des fichiers Filament / الخطوة 7: نشر ملفات Filament
echo "📋 [7/9] Publication des fichiers Filament / نشر ملفات Filament...\n";
passthru('php artisan filament:install --panels -n', $return);
echo "✅ Fichiers Filament publiés / تم نشر ملفات Filament\n\n";

// Étape 8: Liaison du stockage / الخطوة 8: ربط مجلد التخزين
echo "🔗 [8/9] Liaison du dossier de stockage / ربط مجلد التخزين...\n";
passthru('php artisan storage:link', $return);
if ($return !== 0) {
    echo "⚠️  Le lien de stockage existe peut-être déjà / رابط التخزين قد يكون موجوداً بالفعل\n";
} else {
    echo "✅ Dossier de stockage lié / تم ربط مجلد التخزين\n";
}
echo "\n";

// Étape 9: Construction des Assets / الخطوة 9: بناء Assets
if ($hasNode) {
    echo "🎨 [9/9] Construction des Assets / بناء Assets...\n";
    passthru('npm run build 2>&1', $return);
    if ($return !== 0) {
        echo "⚠️  Avertissement: Problème possible avec la construction des Assets\n";
        echo "    تحذير: قد تكون هناك مشكلة في بناء Assets\n";
    } else {
        echo "✅ Assets construits avec succès / تم بناء Assets بنجاح\n";
    }
} else {
    echo "⏭️  [9/9] Construction des Assets ignorée (Node.js non installé)\n";
    echo "      تم تخطي بناء Assets (Node.js غير مثبت)\n";
}
echo "\n";

// Optimisation du cache / تحسين الذاكرة المؤقتة
echo "⚡ Optimisation du cache / تحسين الذاكرة المؤقتة...\n";
passthru('php artisan config:cache');
passthru('php artisan route:cache');
passthru('php artisan view:cache');
echo "✅ Cache optimisé / تم تحسين الذاكرة المؤقتة\n\n";

// Fin / الانتهاء
echo "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";
echo "╔═══════════════════════════════════════════════════════════════════╗\n";
echo "║                                                                   ║\n";
echo "║      🎉 Installation réussie! / تم تثبيت المشروع بنجاح! 🎉       ║\n";
echo "║                                                                   ║\n";
echo "╚═══════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// Informations d'accès / معلومات الوصول
echo "📝 Informations importantes / معلومات هامة:\n\n";
echo "🌐 Site Web / الموقع: http://dips-academy.test\n";
echo "   (ou / أو http://localhost:8000 avec / مع php artisan serve)\n\n";
echo "🔐 Tableau de bord / لوحة التحكم: http://dips-academy.test/admin\n\n";
echo "👤 Identifiants de connexion / بيانات الدخول:\n\n";
echo "   Super Admin:\n";
echo "   - Email / البريد: superadmin@dips-academy.com\n";
echo "   - Mot de passe / كلمة المرور: password\n\n";
echo "   Admin:\n";
echo "   - Email / البريد: admin@dips-academy.com\n";
echo "   - Mot de passe / كلمة المرور: password\n\n";
echo "   Instructeur / Instructor:\n";
echo "   - Email / البريد: instructor1@dips-academy.com\n";
echo "   - Mot de passe / كلمة المرور: password\n\n";

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";
echo "📚 Prochaines étapes / الخطوات التالية:\n\n";
echo "1. Lire la documentation / اقرأ التوثيق:\n";
echo "   - README.md\n";
echo "   - INSTALLATION.md\n";
echo "   - MULTI_TENANT_GUIDE.md\n\n";
echo "2. Tester le système Multi-Tenant / جرب نظام Multi-Tenant:\n";
echo "   php artisan tenant:create 1\n\n";
echo "3. Commencer le développement / ابدأ التطوير:\n";
echo "   - Connectez-vous au tableau de bord / سجل دخول إلى لوحة التحكم\n";
echo "   - Ajoutez de nouveaux cours / أضف دورات جديدة\n";
echo "   - Explorez les fonctionnalités / استكشف الميزات\n\n";

if (!$hasNode) {
    echo "⚠️  Note / ملاحظة:\n";
    echo "   Node.js n'est pas installé. Pour une expérience complète,\n";
    echo "   Node.js غير مثبت. للحصول على تجربة كاملة،\n";
    echo "   veuillez installer Node.js depuis https://nodejs.org/\n";
    echo "   يرجى تثبيت Node.js من https://nodejs.org/\n\n";
}

echo "🎓 Merci d'utiliser DIPS Academy! / شكراً لاستخدام DIPS Academy!\n";
echo "💚 Créé avec amour par / صُنع بحب بواسطة OMAR HAJJOUB\n\n";

// Question sur le démarrage du serveur / سؤال عن تشغيل الخادم
echo "❓ Voulez-vous démarrer le serveur de développement maintenant?\n";
echo "   هل تريد تشغيل خادم التطوير الآن؟ (y/n): ";

// Windows compatible input / إدخال متوافق مع Windows
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $handle = fopen("php://stdin", "r");
    $line = trim(fgets($handle));
    fclose($handle);
} else {
    $line = trim(readline());
}

if (strtolower($line) === 'y' || strtolower($line) === 'yes' || strtolower($line) === 'o' || strtolower($line) === 'oui') {
    echo "\n🚀 Démarrage du serveur de développement / جاري تشغيل خادم التطوير...\n";
    echo "📍 Site / الموقع: http://localhost:8000\n";
    echo "⏹️  Appuyez sur Ctrl+C pour arrêter le serveur / اضغط Ctrl+C لإيقاف الخادم\n\n";
    passthru('php artisan serve');
} else {
    echo "\n✅ Vous pouvez démarrer le serveur plus tard avec:\n";
    echo "   يمكنك تشغيل الخادم لاحقاً باستخدام:\n";
    echo "   php artisan serve\n\n";
}
