# 🚀 Installation Rapide / التثبيت السريع

## DIPS Academy - Installation en 3 étapes / التثبيت في 3 خطوات

### 📋 Avant de commencer / قبل البدء

Assurez-vous d'avoir installé / تأكد من تثبيت:
- ✅ PHP 8.2+ 
- ✅ Composer
- ✅ MySQL 8.0+
- ⚠️ Node.js (optionnel / اختياري)

---

## Étape 1 / الخطوة 1: Cloner le projet / استنساخ المشروع

```bash
git clone https://github.com/Omar-hajjoub/DIPS-Academy.git
cd DIPS-Academy
```

---

## Étape 2 / الخطوة 2: Exécuter l'installation / تشغيل التثبيت

### Sur Windows (Laragon, XAMPP, WAMP)

```bash
php install.php
```

### Sur Linux / macOS

```bash
chmod +x install.sh
./install.sh
```

---

## Étape 3 / الخطوة 3: Démarrer le serveur / تشغيل الخادم

Le script vous demandera si vous voulez démarrer le serveur.  
سيسألك السكريبت إذا كنت تريد تشغيل الخادم.

**Répondez "y" pour oui / أجب "y" لنعم**

Ou manuellement / أو يدوياً:
```bash
php artisan serve
```

---

## 🌐 Accéder à l'application / الوصول إلى التطبيق

### Avec Laragon / مع Laragon
```
http://dips-academy.test
```

### Avec PHP Artisan Serve
```
http://localhost:8000
```

### Tableau de bord Admin / لوحة تحكم المدير
```
http://localhost:8000/admin
```

---

## 🔐 Connexion / تسجيل الدخول

| Email | Mot de passe / كلمة المرور | Rôle / الدور |
|-------|---------------------------|--------------|
| superadmin@dips-academy.com | password | Super Admin |
| admin@dips-academy.com | password | Admin |
| instructor1@dips-academy.com | password | Instructeur / مدرس |

---

## ⚠️ Problèmes courants / المشاكل الشائعة

### Composer n'est pas reconnu / Composer غير معروف
```bash
# Télécharger depuis / حمّل من:
https://getcomposer.org/download/
```

### Erreur de base de données / خطأ قاعدة البيانات
1. Vérifier que MySQL est démarré / تأكد من تشغيل MySQL
2. Créer manuellement la base de données / أنشئ قاعدة البيانات يدوياً:
   ```sql
   CREATE DATABASE dips_academy;
   ```

### Extensions PHP manquantes / امتدادات PHP مفقودة
Activer dans `php.ini` / فعّل في `php.ini`:
```ini
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_mysql
```

---

## 📚 Documentation complète / التوثيق الكامل

Pour plus de détails / للمزيد من التفاصيل:
- 📖 [Installation complète](INSTALLATION_FR_AR.md)
- 📖 [README principal](README_FR_AR.md)
- 🔧 [Résolution de problèmes](TROUBLESHOOTING.md)

---

## ✅ C'est fait! / تم الانتهاء!

Vous pouvez maintenant:  
يمكنك الآن:

1. ✨ Explorer l'interface admin / استكشف واجهة المدير
2. 📚 Créer votre premier cours / أنشئ دورتك الأولى  
3. 👥 Ajouter des utilisateurs / أضف مستخدمين
4. 🎓 Commencer à enseigner / ابدأ التدريس

---

**Créé avec ❤️ par / صُنع بحب بواسطة OMAR HAJJOUB**

🎓 **DIPS Academy - Excellence en Formation / التميز في التعليم**
