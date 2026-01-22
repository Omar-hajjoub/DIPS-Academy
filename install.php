<?php

/**
 * Script d'Installation Automatique pour DIPS Academy
 * Automatic Installation Script for DIPS Academy
 * 
 * Ce script installe automatiquement le projet avec toutes ses dépendances
 * This script automatically installs the project with all its dependencies
 */

// Définir l'encodage pour Windows
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    system('chcp 65001 > NUL 2>&1');
}

echo "\n";
echo "╔═══════════════════════════════════════════════════════════════════╗\n";
echo "║                                                                   ║\n";
echo "║        🎓 DIPS Academy - Installation Automatique                ║\n";
echo "║           Automatic Installation / Installation Automatique      ║\n";
echo "║                                                                   ║\n";
echo "╚═══════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// Vérification de PHP
echo "📋 Vérification des prérequis / Checking prerequisites...\n\n";

$phpVersion = phpversion();
echo "✓ PHP Version: {$phpVersion}\n";

if (version_compare($phpVersion, '8.2.0', '<')) {
    echo "❌ Erreur: PHP 8.2 ou supérieur requis\n";
    echo "   Error: PHP 8.2 or higher required\n";
    echo "   Version actuelle / Current version: {$phpVersion}\n";
    exit(1);
}

// Vérification de Composer
exec('composer -V 2>&1', $output, $return);
if ($return !== 0) {
    echo "❌ Erreur: Composer n'est pas installé\n";
    echo "   Error: Composer is not installed\n";
    echo "📥 Veuillez installer Composer depuis:\n";
    echo "   Please install Composer from: https://getcomposer.org/\n";
    exit(1);
}
echo "✓ Composer: Installé / Installed\n";

// Vérification de Node
exec('node -v 2>&1', $output, $return);
if ($return !== 0) {
    echo "⚠️  Avertissement: Node.js n'est pas installé\n";
    echo "   Warning: Node.js is not installed\n";
    echo "📥 Recommandé / Recommended: https://nodejs.org/\n";
    $hasNode = false;
} else {
    echo "✓ Node.js: Installé / Installed\n";
    $hasNode = true;
}

// Vérification des extensions PHP requises
echo "\n📦 Vérification des extensions PHP / Checking PHP extensions:\n";
$requiredExtensions = ['pdo', 'mbstring', 'fileinfo', 'openssl', 'tokenizer', 'xml', 'curl', 'zip'];
$missingExtensions = [];

foreach ($requiredExtensions as $ext) {
    if (extension_loaded($ext)) {
        echo "  ✓ {$ext}\n";
    } else {
        echo "  ❌ {$ext} (manquant / missing)\n";
        $missingExtensions[] = $ext;
    }
}

if (!empty($missingExtensions)) {
    echo "\n❌ Extensions manquantes / Missing extensions: " . implode(', ', $missingExtensions) . "\n";
    echo "   Veuillez les activer dans php.ini\n";
    echo "   Please enable them in php.ini\n";
    exit(1);
}

echo "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";

// Début de l'installation
echo "🚀 Démarrage de l'installation / Starting installation...\n\n";

// Étape 1: Installation des dépendances Composer
echo "📦 [1/9] Installation des dépendances PHP (Composer)\n";
echo "      Installing PHP dependencies (Composer)...\n";
passthru('composer install --no-interaction --prefer-dist', $return);
if ($return !== 0) {
    echo "❌ Échec de l'installation des dépendances Composer\n";
    echo "   Failed to install Composer dependencies\n";
    exit(1);
}
echo "✅ Dépendances PHP installées avec succès\n";
echo "   PHP dependencies installed successfully\n\n";

// Étape 2: Installation des dépendances NPM
if ($hasNode) {
    echo "📦 [2/9] Installation des dépendances JavaScript (NPM)\n";
    echo "      Installing JavaScript dependencies (NPM)...\n";
    passthru('npm install 2>&1', $return);
    if ($return !== 0) {
        echo "⚠️  Avertissement: Problème possible avec NPM\n";
        echo "   Warning: Possible issue with NPM\n";
    } else {
        echo "✅ Dépendances JavaScript installées\n";
        echo "   JavaScript dependencies installed\n";
    }
} else {
    echo "⏭️  [2/9] Étape NPM ignorée (Node.js non installé)\n";
    echo "      NPM step skipped (Node.js not installed)\n";
}
echo "\n";

// Étape 3: Copie du fichier .env
echo "⚙️  [3/9] Configuration du fichier d'environnement (.env)\n";
echo "      Setting up environment file (.env)...\n";
if (!file_exists('.env')) {
    if (file_exists('.env.example')) {
        copy('.env.example', '.env');
        echo "✅ Fichier .env créé depuis .env.example\n";
        echo "   .env file created from .env.example\n";
    } else {
        echo "❌ Erreur: Fichier .env.example introuvable\n";
        echo "   Error: .env.example file not found\n";
        exit(1);
    }
} else {
    echo "ℹ️  Fichier .env déjà existant\n";
    echo "   .env file already exists\n";
}
echo "\n";

// Étape 4: Génération de la clé d'application
echo "🔑 [4/9] Génération de la clé d'application\n";
echo "      Generating application key...\n";
passthru('php artisan key:generate --force', $return);
if ($return !== 0) {
    echo "❌ Échec de la génération de la clé\n";
    echo "   Failed to generate application key\n";
    exit(1);
}
echo "✅ Clé d'application générée\n";
echo "   Application key generated\n\n";

// Étape 5: Configuration de la base de données
echo "🗄️  [5/9] Configuration de la base de données\n";
echo "      Setting up database...\n";
echo "ℹ️  Assurez-vous que MySQL est en cours d'exécution\n";
echo "   Make sure MySQL is running\n";

// Lecture des paramètres de la base de données
$env = file_get_contents('.env');
preg_match('/DB_DATABASE=(.*)/', $env, $matches);
$dbName = trim($matches[1] ?? 'dips_academy');

preg_match('/DB_HOST=(.*)/', $env, $matches);
$dbHost = trim($matches[1] ?? '127.0.0.1');

preg_match('/DB_USERNAME=(.*)/', $env, $matches);
$dbUser = trim($matches[1] ?? 'root');

preg_match('/DB_PASSWORD=(.*)/', $env, $matches);
$dbPassword = trim($matches[1] ?? '');

echo "📊 Base de données / Database: {$dbName}\n";
echo "🖥️  Hôte / Host: {$dbHost}\n";

// Tentative de création de la base de données
try {
    $pdo = new PDO("mysql:host={$dbHost}", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Base de données créée / Database created: {$dbName}\n";
} catch (PDOException $e) {
    echo "⚠️  Avertissement: Impossible de créer la base de données automatiquement\n";
    echo "   Warning: Unable to create database automatically\n";
    echo "ℹ️  Veuillez créer manuellement la base de données\n";
    echo "   Please create the database manually\n";
    echo "   Nom / Name: {$dbName}\n";
    echo "   Erreur / Error: " . $e->getMessage() . "\n";
}
echo "\n";

// Étape 6: Exécution des Migrations
echo "🔄 [6/9] Exécution des Migrations\n";
echo "      Running Migrations...\n";
passthru('php artisan migrate --force --seed', $return);
if ($return !== 0) {
    echo "❌ Échec de l'exécution des Migrations\n";
    echo "   Failed to run Migrations\n";
    echo "ℹ️  Vérifiez les paramètres de la base de données dans .env\n";
    echo "   Please check database settings in .env\n";
    exit(1);
}
echo "✅ Migrations exécutées avec succès\n";
echo "   Migrations executed successfully\n\n";

// Étape 7: Publication des fichiers Filament
echo "📋 [7/9] Publication des fichiers Filament\n";
echo "      Publishing Filament files...\n";
passthru('php artisan filament:install --panels -n', $return);
echo "✅ Fichiers Filament publiés\n";
echo "   Filament files published\n\n";

// Étape 8: Liaison du stockage
echo "🔗 [8/9] Liaison du dossier de stockage\n";
echo "      Linking storage folder...\n";
passthru('php artisan storage:link', $return);
if ($return !== 0) {
    echo "⚠️  Le lien de stockage existe peut-être déjà\n";
    echo "   Storage link may already exist\n";
} else {
    echo "✅ Dossier de stockage lié\n";
    echo "   Storage folder linked\n";
}
echo "\n";

// Étape 9: Construction des Assets
if ($hasNode) {
    echo "🎨 [9/9] Construction des Assets\n";
    echo "      Building Assets...\n";
    passthru('npm run build 2>&1', $return);
    if ($return !== 0) {
        echo "⚠️  Avertissement: Problème possible avec la construction des Assets\n";
        echo "   Warning: Possible issue building Assets\n";
    } else {
        echo "✅ Assets construits avec succès\n";
        echo "   Assets built successfully\n";
    }
} else {
    echo "⏭️  [9/9] Construction des Assets ignorée (Node.js non installé)\n";
    echo "      Assets building skipped (Node.js not installed)\n";
}
echo "\n";

// Optimisation du cache
echo "⚡ Optimisation du cache / Optimizing cache...\n";
passthru('php artisan config:cache');
passthru('php artisan route:cache');
passthru('php artisan view:cache');
echo "✅ Cache optimisé / Cache optimized\n\n";

// Fin
echo "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";
echo "╔═══════════════════════════════════════════════════════════════════╗\n";
echo "║                                                                   ║\n";
echo "║      🎉 Installation réussie! / Installation successful! 🎉      ║\n";
echo "║                                                                   ║\n";
echo "╚═══════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// Informations d'accès
echo "📝 Informations importantes / Important information:\n\n";
echo "🌐 Site Web / Website: http://dips-academy.test\n";
echo "   (ou / or http://localhost:8000 avec / with php artisan serve)\n\n";
echo "🔐 Tableau de bord / Dashboard: http://dips-academy.test/admin\n\n";
echo "👤 Identifiants de connexion / Login credentials:\n\n";
echo "   Super Admin:\n";
echo "   - Email: superadmin@dips-academy.com\n";
echo "   - Mot de passe / Password: password\n\n";
echo "   Admin:\n";
echo "   - Email: admin@dips-academy.com\n";
echo "   - Mot de passe / Password: password\n\n";
echo "   Instructeur / Instructor:\n";
echo "   - Email: instructor1@dips-academy.com\n";
echo "   - Mot de passe / Password: password\n\n";

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n";
echo "📚 Prochaines étapes / Next steps:\n\n";
echo "1. Lire la documentation / Read documentation:\n";
echo "   - README.md\n";
echo "   - INSTALLATION.md\n";
echo "   - MULTI_TENANT_GUIDE.md\n\n";
echo "2. Tester le système Multi-Tenant / Test Multi-Tenant system:\n";
echo "   php artisan tenant:create 1\n\n";
echo "3. Commencer le développement / Start development:\n";
echo "   - Connectez-vous au tableau de bord / Login to dashboard\n";
echo "   - Ajoutez de nouveaux cours / Add new courses\n";
echo "   - Explorez les fonctionnalités / Explore features\n\n";

if (!$hasNode) {
    echo "⚠️  Note:\n";
    echo "   Node.js n'est pas installé. Pour une expérience complète,\n";
    echo "   Node.js is not installed. For a complete experience,\n";
    echo "   veuillez installer Node.js depuis / please install Node.js from:\n";
    echo "   https://nodejs.org/\n\n";
}

echo "🎓 Merci d'utiliser DIPS Academy! / Thank you for using DIPS Academy!\n";
echo "💚 Créé avec amour par / Created with love by OMAR HAJJOUB\n\n";

// Question sur le démarrage du serveur
echo "❓ Voulez-vous démarrer le serveur de développement maintenant?\n";
echo "   Do you want to start the development server now? (y/n): ";

// Windows compatible input
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $handle = fopen("php://stdin", "r");
    $line = trim(fgets($handle));
    fclose($handle);
} else {
    $line = trim(readline());
}

if (strtolower($line) === 'y' || strtolower($line) === 'yes' || strtolower($line) === 'o' || strtolower($line) === 'oui') {
    echo "\n🚀 Démarrage du serveur de développement / Starting development server...\n";
    echo "📍 Site / Website: http://localhost:8000\n";
    echo "⏹️  Appuyez sur Ctrl+C pour arrêter le serveur\n";
    echo "   Press Ctrl+C to stop the server\n\n";
    passthru('php artisan serve');
} else {
    echo "\n✅ Vous pouvez démarrer le serveur plus tard avec:\n";
    echo "   You can start the server later with:\n";
    echo "   php artisan serve\n\n";
}
