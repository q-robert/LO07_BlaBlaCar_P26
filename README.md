# LO07_BlaBlaCar_P26 HIHIHIHA
> *Développement d’un prototype d’application web connectée à une base de données relationnelle suivant le modèle MVC.*

---

### Présentation du projet
Projet réalisé en binôme dans le cadre du cours de développement web (LO07) à l'Université de Technologie de Troyes (UTT). L'objectif était de concevoir une plateforme de covoiturage fonctionnelle en appliquant les bonnes pratiques de développement web et de gestion des bases de données.

### Portée du projet
- Une implémentation respectant le principe MVC,
- Une modélisation d'une base de données relationnelle via l'inteface PDO de php,
- Une gestion des utilisateurs et de leurs niveaux d'autorité,
- Des requêtes SQL sécurisées (préparées).
- Interfaces responsives avec Boostrap 5

---

### Installation et déploiement
Le projet peut être exécuté en local ou sur un serveur web.

1. **Base de données** :
Vous trouverez le fichier de structure avec des données de test ici : `outil/blablacar2026.sql`

2. **Configuration** :
Pour un déploiement sur un serveur distant, vous devrez mettre les identifiants de connexion à la base de données dans le fichier : `app/controller/config.php`
  
3. **Test** :
Afin de tester l'application vous pouvez utiliser les identifiants suivant :

| Rôle | Login | Mot de passe |
| :--- | :--- | :--- |
| **Administrateur** | `boss` | `secret` |
| **Conducteur** | `trisprior` | `secret` |
| **Passager** | `calebprior` | `secret` |
