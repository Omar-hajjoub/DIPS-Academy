# 🎓 DIPS Academy

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-3.x-FFAA00?style=for-the-badge&logo=filament&logoColor=white)

**Plateforme d'apprentissage en ligne moderne et complète**  
**منصة تعليمية حديثة ومتكاملة عبر الإنترنت**

[🌐 Démo](http://dips-academy.test) • [📚 Documentation](INSTALLATION_FR_AR.md) • [🐛 Signaler un bug](https://github.com/Omar-hajjoub/DIPS-Academy/issues)

</div>

---

## 📖 À propos / حول المشروع

**DIPS Academy** est une plateforme d'apprentissage en ligne (LMS - Learning Management System) développée avec Laravel 11 et Filament 3. Elle permet aux instructeurs de créer et gérer des cours, et aux étudiants d'apprendre de manière interactive.

**DIPS Academy** هي منصة إدارة تعلم (LMS) مطورة باستخدام Laravel 11 و Filament 3. تتيح للمدرسين إنشاء وإدارة الدورات، وللطلاب التعلم بشكل تفاعلي.

### ✨ Fonctionnalités principales / الميزات الرئيسية

#### 🎯 Gestion des cours / إدارة الدورات
- ✅ Création et modification de cours / إنشاء وتعديل الدورات
- ✅ Système de catégories / نظام التصنيفات
- ✅ Niveaux de difficulté (Débutant, Intermédiaire, Avancé) / مستويات الصعوبة
- ✅ Prix et réductions / الأسعار والتخفيضات
- ✅ Système de publication / نظام النشر

#### 📚 Gestion des leçons / إدارة الدروس
- ✅ Leçons vidéo, texte, et quiz / دروس فيديو، نصية، واختبارات
- ✅ Ordre personnalisable / ترتيب قابل للتخصيص
- ✅ Aperçu gratuit / معاينة مجانية
- ✅ Suivi de progression / تتبع التقدم

#### 👥 Gestion des utilisateurs / إدارة المستخدمين
- ✅ Système de rôles et permissions / نظام الأدوار والصلاحيات
  - Super Admin
  - Admin
  - Instructeur / المدرس
  - Étudiant / الطالب
- ✅ Authentification sécurisée / مصادقة آمنة
- ✅ Profils utilisateurs / ملفات المستخدمين

#### 📊 Fonctionnalités avancées / الميزات المتقدمة
- ✅ **Multi-Tenant** - Support de bases de données multiples / دعم قواعد بيانات متعددة
- ✅ Quiz interactifs / اختبارات تفاعلية
- ✅ Certificats de fin de cours / شهادات إتمام الدورة
- ✅ Système d'évaluation et commentaires / نظام التقييمات والتعليقات
- ✅ Tableau de bord analytique / لوحة تحكم تحليلية
- ✅ Inscriptions aux cours / التسجيل في الدورات

#### 🛠️ Technologies / التقنيات
- **Backend:** Laravel 11
- **Admin Panel:** Filament 3
- **Base de données:** MySQL 8.0+
- **PHP:** 8.2+
- **Frontend:** Blade, Livewire, Alpine.js, Tailwind CSS
- **Authentification:** Laravel Sanctum
- **Permissions:** Spatie Laravel Permission

---

## 🚀 Installation rapide / التثبيت السريع

### Méthode 1: Installation automatique / الطريقة 1: التثبيت التلقائي

```bash
# Cloner le projet / استنساخ المشروع
git clone https://github.com/Omar-hajjoub/DIPS-Academy.git
cd DIPS-Academy

# Exécuter le script d'installation / تشغيل سكريبت التثبيت
php install.php
```

### Méthode 2: Installation avec Docker / الطريقة 2: التثبيت باستخدام Docker

```bash
# Cloner le projet / استنساخ المشروع
git clone https://github.com/Omar-hajjoub/DIPS-Academy.git
cd DIPS-Academy

# Démarrer Docker / تشغيل Docker
docker-compose up -d

# Installer les dépendances / تثبيت التبعيات
docker-compose exec app composer install
docker-compose exec app php artisan migrate --seed
```

### Méthode 3: Installation manuelle / الطريقة 3: التثبيت اليدوي

Consultez le guide complet / راجع الدليل الكامل: [INSTALLATION_FR_AR.md](INSTALLATION_FR_AR.md)

---

## 📁 Structure du projet / هيكل المشروع

```
dips-academy/
├── app/
│   ├── Console/           # Commandes Artisan / أوامر Artisan
│   ├── Filament/         # Ressources Admin Panel / موارد لوحة التحكم
│   ├── Http/             # Controllers & Middleware / المتحكمات والوسطاء
│   ├── Models/           # Modèles Eloquent / نماذج Eloquent
│   └── Services/         # Services métier / الخدمات
├── database/
│   ├── migrations/       # Migrations / الترحيلات
│   ├── seeders/          # Seeders / البذور
│   └── factories/        # Factories / المصانع
├── resources/
│   ├── views/            # Vues Blade / عروض Blade
│   ├── css/              # Styles / الأنماط
│   └── js/               # JavaScript
├── routes/
│   ├── web.php           # Routes web / مسارات الويب
│   └── console.php       # Routes console / مسارات الكونسول
├── docker/               # Configuration Docker / إعداد Docker
├── install.php           # Script d'installation / سكريبت التثبيت
└── docker-compose.yml    # Docker Compose
```

---

## 🔐 Identifiants par défaut / بيانات الدخول الافتراضية

| Rôle / الدور | Email / البريد | Mot de passe / كلمة المرور |
|---------------|----------------|---------------------------|
| Super Admin | superadmin@dips-academy.com | password |
| Admin | admin@dips-academy.com | password |
| Instructeur / مدرس | instructor1@dips-academy.com | password |
| Étudiant / طالب | student1@dips-academy.com | password |

> ⚠️ **Important:** Changez ces mots de passe en production!  
> ⚠️ **مهم:** غيّر هذه الكلمات في الإنتاج!

---

## 📚 Documentation / التوثيق

- 📖 [Installation complète / التثبيت الكامل](INSTALLATION_FR_AR.md)
- 🏢 [Guide Multi-Tenant / دليل المستأجرين المتعددين](MULTI_TENANT_GUIDE.md)
- 👥 [Flux de travail en équipe / سير عمل الفريق](TEAM_WORKFLOW.md)
- 🔧 [Résolution de problèmes / حل المشاكل](TROUBLESHOOTING.md)
- 🐳 [Guide Docker / دليل Docker](docker/README.md)

---

## 🎯 Cas d'utilisation / حالات الاستخدام

### Pour les établissements d'enseignement / للمؤسسات التعليمية
- Universités / الجامعات
- Écoles / المدارس
- Centres de formation / مراكز التدريب

### Pour les entreprises / للشركات
- Formation interne / التدريب الداخلي
- Onboarding des employés / تأهيل الموظفين
- Développement professionnel / التطوير المهني

### Pour les instructeurs indépendants / للمدرسين المستقلين
- Cours en ligne / الدورات عبر الإنترنت
- Tutoriels / الدروس التعليمية
- Formations certifiantes / التدريبات المعتمدة

---

## 🛣️ Feuille de route / خارطة الطريق

### Version 2.0 (En développement / قيد التطوير)
- [ ] Système de paiement intégré / نظام الدفع المدمج
- [ ] Application mobile (Flutter) / تطبيق الهاتف المحمول
- [ ] Visioconférence en direct / مؤتمرات الفيديو المباشرة
- [ ] Gamification / التلعيب
- [ ] API REST complète / API REST كاملة
- [ ] Support multilingue / دعم متعدد اللغات
- [ ] Mode sombre / الوضع الداكن
- [ ] Notifications push / إشعارات الدفع

### Version 2.1
- [ ] IA pour recommandations de cours / الذكاء الاصطناعي لتوصيات الدورات
- [ ] Chat en temps réel / الدردشة الفورية
- [ ] Forum de discussion / منتدى النقاش
- [ ] Exercices de code interactifs / تمارين برمجية تفاعلية

---

## 🤝 Contribution / المساهمة

Les contributions sont les bienvenues! / المساهمات مرحب بها!

### Comment contribuer / كيفية المساهمة

1. **Fork le projet / انسخ المشروع**
   ```bash
   git clone https://github.com/votre-username/DIPS-Academy.git
   ```

2. **Créer une branche / أنشئ فرعاً**
   ```bash
   git checkout -b feature/NouvelleFonctionnalite
   ```

3. **Commit vos changements / ارفع تغييراتك**
   ```bash
   git commit -m "Ajout d'une nouvelle fonctionnalité"
   ```

4. **Push vers la branche / ارفع إلى الفرع**
   ```bash
   git push origin feature/NouvelleFonctionnalite
   ```

5. **Ouvrir une Pull Request / افتح طلب سحب**

### Directives / الإرشادات
- Suivre PSR-12 pour le code PHP / اتبع PSR-12 للكود PHP
- Écrire des tests / اكتب اختبارات
- Documenter les nouvelles fonctionnalités / وثّق الميزات الجديدة
- Code en anglais, commentaires en français/arabe OK / الكود بالإنجليزية، التعليقات بالفرنسية/العربية مقبولة

---

## 📝 Licence / الترخيص

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.

هذا المشروع مرخص تحت MIT - راجع ملف [LICENSE](LICENSE) للتفاصيل.

### Conditions / الشروط
- ✅ Usage commercial / الاستخدام التجاري
- ✅ Modification / التعديل
- ✅ Distribution / التوزيع
- ✅ Usage privé / الاستخدام الخاص
- ❌ Responsabilité / المسؤولية
- ❌ Garantie / الضمان

---

## 📞 Contact & Support / التواصل والدعم

### Développeur principal / المطور الرئيسي
**OMAR HAJJOUB**
- 📧 Email: omar.hajjoub@dips-academy.com
- 🐙 GitHub: [@Omar-hajjoub](https://github.com/Omar-hajjoub)
- 💼 LinkedIn: [Omar Hajjoub](https://linkedin.com/in/omar-hajjoub)

### Communauté / المجتمع
- 💬 [Discussions GitHub](https://github.com/Omar-hajjoub/DIPS-Academy/discussions)
- 🐛 [Signaler un bug](https://github.com/Omar-hajjoub/DIPS-Academy/issues)
- 💡 [Proposer une fonctionnalité](https://github.com/Omar-hajjoub/DIPS-Academy/issues/new)

---

## 🙏 Remerciements / شكر وتقدير

### Technologies utilisées / التقنيات المستخدمة
- [Laravel](https://laravel.com) - Framework PHP
- [Filament](https://filamentphp.com) - Admin Panel
- [Livewire](https://laravel-livewire.com) - Composants interactifs
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- [Alpine.js](https://alpinejs.dev) - Framework JavaScript
- [Spatie](https://spatie.be) - Packages Laravel

### Contributeurs / المساهمون
Un grand merci à tous ceux qui ont contribué à ce projet!  
شكر كبير لكل من ساهم في هذا المشروع!

---

## 📊 Statistiques / الإحصائيات

<div align="center">

![GitHub stars](https://img.shields.io/github/stars/Omar-hajjoub/DIPS-Academy?style=social)
![GitHub forks](https://img.shields.io/github/forks/Omar-hajjoub/DIPS-Academy?style=social)
![GitHub issues](https://img.shields.io/github/issues/Omar-hajjoub/DIPS-Academy)
![GitHub pull requests](https://img.shields.io/github/issues-pr/Omar-hajjoub/DIPS-Academy)

</div>

---

## 🌟 Soutenez le projet / ادعم المشروع

Si vous trouvez ce projet utile, n'hésitez pas à:  
إذا وجدت هذا المشروع مفيداً، لا تتردد في:

- ⭐ Mettre une étoile sur GitHub / ضع نجمة على GitHub
- 🍴 Fork le projet / انسخ المشروع
- 📢 Partager avec vos amis / شارك مع أصدقائك
- 🐛 Signaler des bugs / أبلغ عن الأخطاء
- 💡 Proposer des améliorations / اقترح تحسينات

---

<div align="center">

**Fait avec ❤️ par OMAR HAJJOUB**  
**صُنع بحب بواسطة عمر حجوب**

🎓 **Excellence en Formation / التميز في التعليم**

</div>

---

## 📸 Captures d'écran / لقطات الشاشة

### Tableau de bord / لوحة التحكم
![Dashboard](screenshots/dashboard.png)

### Gestion des cours / إدارة الدورات
![Courses](screenshots/courses.png)

### Leçons / الدروس
![Lessons](screenshots/lessons.png)

### Profil utilisateur / الملف الشخصي
![Profile](screenshots/profile.png)

---

## ❓ FAQ / الأسئلة الشائعة

### Est-ce gratuit? / هل هو مجاني؟
Oui! Le projet est open-source sous licence MIT.  
نعم! المشروع مفتوح المصدر تحت ترخيص MIT.

### Puis-je l'utiliser commercialement? / هل يمكنني استخدامه تجارياً؟
Absolument! C'est l'objectif de la licence MIT.  
بالتأكيد! هذا هو الهدف من ترخيص MIT.

### Comment obtenir de l'aide? / كيف أحصل على المساعدة؟
Consultez la documentation ou créez une issue sur GitHub.  
راجع التوثيق أو أنشئ issue على GitHub.

### Puis-je contribuer? / هل يمكنني المساهمة؟
Bien sûr! Toutes les contributions sont les bienvenues.  
بالطبع! جميع المساهمات مرحب بها.

---

<div align="center">

**Version actuelle / النسخة الحالية:** 1.0.0  
**Dernière mise à jour / آخر تحديث:** Janvier 2026

[⬆ Retour en haut / العودة للأعلى](#-dips-academy)

</div>
