# 🔧 Problèmes Courants et Solutions / Common Issues and Solutions

Guide de résolution des problèmes fréquents lors de l'installation de DIPS Academy.

---

## 🚨 Problème 1: Extension PHP manquante (intl, gd, bcmath)

### Symptômes:
```
Your lock file does not contain a compatible set of packages.
filament/support v3.3.47 requires ext-intl * -> it is missing from your system.
```

### ✅ Solution:

#### Pour Laragon:
1. **Ouvrir le menu:**
   - Clic droit sur Laragon → PHP → Version → php.ini

2. **Activer les extensions:**
   ```ini
   # Chercher ces lignes et retirer le point-virgule (;)
   ;extension=intl     →  extension=intl
   ;extension=gd       →  extension=gd
   ;extension=bcmath   →  extension=bcmath
   ```

3. **Redémarrer:**
   - Menu Laragon → Redémarrer tous

#### Pour XAMPP:
1. **Ouvrir le fichier:**
   - `C:\xampp\php\php.ini`

2. **Activer les extensions:**
   ```ini
   extension=intl
   extension=gd
   extension=bcmath
   ```

3. **Redémarrer:**
   - XAMPP Control Panel → Stop All → Start All

#### Pour Herd (Windows):
1. **Localiser php.ini:**
   ```bash
   php --ini
   ```
   
2. **Éditer le fichier:**
   ```ini
   extension=intl
   extension=gd
   extension=bcmath
   ```

3. **Redémarrer Herd:**
   - Fermer et réouvrir Herd

#### Pour WAMP:
1. **Menu WAMP:**
   - Clic gauche → PHP → php.ini

2. **Activer les extensions:**
   ```ini
   extension=intl
   extension=gd
   extension=bcmath
   ```

3. **Redémarrer:**
   - Redémarrer tous les services

### Vérifier l'activation:
```bash
php -m | grep intl
php -m | grep gd
php -m | grep bcmath
```

---

## 🚨 Problème 2: vendor/autoload.php introuvable

### Symptômes:
```
Warning: require(vendor/autoload.php): Failed to open stream: No such file or directory
Fatal error: Failed opening required 'vendor/autoload.php'
```

### Cause:
Les dépendances Composer n'ont pas été installées.

### ✅ Solution:

1. **Vérifier Composer:**
   ```bash
   composer --version
   ```

2. **Installer les dépendances:**
   ```bash
   composer install
   ```

3. **Si composer install échoue:**
   ```bash
   # Mettre à jour composer
   composer self-update
   
   # Nettoyer le cache
   composer clear-cache
   
   # Réinstaller
   composer install --no-cache
   ```

---

## 🚨 Problème 3: Erreur de connexion à la base de données

### Symptômes:
```
SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost'
```

### ✅ Solution:

1. **Vérifier que MySQL est démarré:**
   - Laragon: Menu → MySQL → Start
   - XAMPP: Control Panel → MySQL → Start

2. **Vérifier les identifiants dans `.env`:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=dips_academy
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Créer la base de données manuellement:**
   ```sql
   CREATE DATABASE dips_academy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

4. **Tester la connexion:**
   ```bash
   php artisan migrate:status
   ```

---

## 🚨 Problème 4: Port 8000 déjà utilisé

### Symptômes:
```
Failed to listen on 127.0.0.1:8000 (reason: Address already in use)
```

### ✅ Solution:

**Option 1 - Utiliser un autre port:**
```bash
php artisan serve --port=8080
```

**Option 2 - Tuer le processus existant:**

Windows (PowerShell):
```powershell
netstat -ano | findstr :8000
taskkill /PID <PID> /F
```

Linux/Mac:
```bash
lsof -ti:8000 | xargs kill -9
```

---

## 🚨 Problème 5: Erreur de permissions (Linux/Mac)

### Symptômes:
```
Permission denied: storage/logs/laravel.log
```

### ✅ Solution:

```bash
# Donner les permissions nécessaires
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Ou pour l'utilisateur courant
chmod -R 777 storage bootstrap/cache
```

---

## 🚨 Problème 6: Clé d'application non définie

### Symptômes:
```
No application encryption key has been specified.
```

### ✅ Solution:

```bash
php artisan key:generate
```

---

## 🚨 Problème 7: Erreur npm/Node.js

### Symptômes:
```
npm ERR! code ENOENT
npm ERR! syscall open
```

### ✅ Solution:

1. **Vérifier Node.js:**
   ```bash
   node --version
   npm --version
   ```

2. **Réinstaller Node.js:**
   - Télécharger depuis: https://nodejs.org/
   - Version recommandée: LTS (Long Term Support)

3. **Nettoyer et réinstaller:**
   ```bash
   # Supprimer node_modules
   rm -rf node_modules package-lock.json
   
   # Réinstaller
   npm install
   ```

---

## 🚨 Problème 8: Erreur Composer "memory limit"

### Symptômes:
```
PHP Fatal error: Allowed memory size exhausted
```

### ✅ Solution:

**Temporaire:**
```bash
php -d memory_limit=-1 $(which composer) install
```

**Permanent (php.ini):**
```ini
memory_limit = 512M
; ou
memory_limit = -1
```

---

## 🚨 Problème 9: Filament n'apparaît pas

### Symptômes:
La route `/admin` retourne 404

### ✅ Solution:

1. **Réinstaller Filament:**
   ```bash
   php artisan filament:install --panels -n
   ```

2. **Nettoyer le cache:**
   ```bash
   php artisan optimize:clear
   php artisan config:cache
   php artisan route:cache
   ```

3. **Vérifier les routes:**
   ```bash
   php artisan route:list | grep admin
   ```

---

## 🚨 Problème 10: Erreur lors du seeding

### Symptômes:
```
SQLSTATE[23000]: Integrity constraint violation
```

### ✅ Solution:

1. **Réinitialiser la base de données:**
   ```bash
   php artisan migrate:fresh --seed
   ```

2. **Si le problème persiste:**
   ```bash
   # Supprimer la base de données
   php artisan db:wipe
   
   # Recréer tout
   php artisan migrate:fresh --seed
   ```

---

## 📞 Besoin d'aide supplémentaire?

### Options de support:

1. **Documentation:**
   - [README.md](README.md)
   - [INSTALLATION_FR_AR.md](INSTALLATION_FR_AR.md)
   - [TROUBLESHOOTING.md](TROUBLESHOOTING.md)

2. **GitHub Issues:**
   - https://github.com/Omar-hajjoub/DIPS-Academy/issues

3. **Vérifier les logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

4. **Mode debug:**
   Activer dans `.env`:
   ```env
   APP_DEBUG=true
   ```
   ⚠️ **Ne jamais activer en production!**

---

## ✅ Checklist avant de demander de l'aide

Avant de signaler un problème, vérifiez:

- [ ] PHP version 8.2 ou supérieure
- [ ] Toutes les extensions PHP activées (intl, gd, bcmath, etc.)
- [ ] Composer installé et à jour
- [ ] MySQL démarré
- [ ] Base de données créée
- [ ] Fichier `.env` configuré correctement
- [ ] `composer install` exécuté avec succès
- [ ] `php artisan key:generate` exécuté
- [ ] Permissions correctes (Linux/Mac)
- [ ] Cache nettoyé (`php artisan optimize:clear`)

---

## 🔍 Commandes de diagnostic utiles

```bash
# Version PHP
php -v

# Extensions PHP chargées
php -m

# Version Composer
composer --version

# Version Node/npm
node --version
npm --version

# État de la base de données
php artisan migrate:status

# Lister les routes
php artisan route:list

# Vérifier la configuration
php artisan config:show

# Logs en temps réel
tail -f storage/logs/laravel.log
```

---

**Créé avec ❤️ par OMAR HAJJOUB**

🎓 **DIPS Academy - Excellence en Formation**
