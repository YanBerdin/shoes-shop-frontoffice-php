# Project_Architecture_Blueprint.md

## 1. Analyse de l’architecture

### Stack technologique

- **Backend** : PHP 7.x+
- **Base de données** : MySQL
- **Frontend** : HTML, CSS, Bootstrap (framework CSS), JS (jQuery, Popper.js)
- **Gestionnaire de dépendances** : Composer (PHP)
- **Routage** : AltoRouter (PHP)

### Motif architectural principal

- **Pattern** : MVC (Model-View-Controller) monolithique
- **Organisation** : Par couche (contrôleurs, modèles, vues)
- **Pas de microservices, ni de découpage modulaire avancé**

## 2. Vue d’ensemble architecturale

L’architecture suit un schéma MVC classique :

- **Contrôleurs** : orchestrent la logique métier et le routage
- **Modèles** : encapsulent l’accès aux données et la logique métier
- **Vues** : gèrent l’affichage et la présentation

Les assets statiques (CSS, JS, images) sont séparés dans `public/assets/`. La documentation et les scripts SQL sont dans `docs/`.

## 3. Visualisation de l’architecture (C4 simplifié)

- **Contexte** :
  - Utilisateur → Navigateur → Serveur PHP (MVC) → MySQL
- **Conteneurs** :
  - Application PHP (contrôleurs, modèles, vues)
  - Base de données MySQL
  - Assets statiques servis par le serveur web
- **Composants** :
  - Contrôleurs (ex : CatalogController)
  - Modèles (ex : Product, Category)
  - Vues (ex : product.tpl.php)
  - Utilitaires (Database.php)

## 4. Composants architecturaux principaux

### Contrôleurs

- **Rôle** : Reçoivent les requêtes, orchestrent la logique, sélectionnent la vue
- **Structure** : Un fichier par domaine métier (ex : CatalogController.php)
- **Interactions** : Appellent les modèles, transmettent les données aux vues
- **Extension** : Ajouter un contrôleur pour chaque nouveau domaine

### Modèles

- **Rôle** : Accès aux données, logique métier
- **Structure** : Un fichier par entité (ex : Product.php)
- **Interactions** : Utilisés par les contrôleurs
- **Extension** : Ajouter un modèle pour chaque nouvelle table/entité

### Vues

- **Rôle** : Affichage, présentation HTML
- **Structure** : Un fichier `.tpl.php` par page ou composant d’interface
- **Interactions** : Reçoivent les données des contrôleurs
- **Extension** : Ajouter une vue pour chaque nouvelle page ou composant

### Utilitaires

- **Rôle** : Fonctions partagées (ex : connexion BDD)
- **Structure** : Fichiers dans `app/Utils/`

## 5. Couches et dépendances

- **Couches** :
  - Contrôleur → Modèle → Base de données
  - Contrôleur → Vue
- **Règles** :
  - Les vues ne connaissent pas les modèles
  - Les modèles n’appellent pas les vues
  - Les contrôleurs orchestrent tout
- **Pas de dépendances circulaires détectées**

## 6. Architecture des données

- **Modélisation** : 4 entités principales (Product, Category, Brand, Type)
- **Relations** : Voir `docs/modelisation_bdd.md` (MCD/MLD)
- **Accès** : Modèles PHP accèdent à la BDD via PDO/MySQL
- **Validation** : À implémenter côté modèle ou contrôleur
- **Pas de cache ni de mapping avancé détecté**

## 7. Transverses (cross-cutting concerns)

- **Authentification** : Non implémentée côté front, gérée dans le back-office/API séparé
- **Gestion des erreurs** : Contrôleur d’erreur dédié (`ErrorController.php`), pages d’erreur dédiées
- **Logs/Monitoring** : Non détecté (à ajouter si besoin)
- **Validation** : À la charge des contrôleurs/modèles
- **Configuration** : Fichier `config.ini` (non versionné), `composer.json` pour PHP

## 8. Communication entre services

- **Monolithique** : Pas de microservices ni d’API interne
- **API** : Le back-office/API est dans un autre dépôt
- **Protocoles** : HTTP (navigateur ↔ serveur)

## 9. Patterns spécifiques aux technologies

### PHP/MVC

- Un fichier par classe (modèle, contrôleur)
- Routage centralisé via AltoRouter
- Inclusion des vues via contrôleur
- Utilisation de Composer pour l’autoloading

### Frontend

- Bootstrap, jQuery, Popper.js inclus comme fichiers minifiés standards
- Pas de framework JS moderne

## 10. Patterns d’implémentation

- **Contrôleurs** :
  - Méthodes publiques pour chaque action
  - Appellent les modèles, puis incluent la vue
- **Modèles** :
  - Méthodes pour CRUD sur chaque entité
  - Utilisation de PDO pour la BDD
- **Vues** :
  - Variables PHP injectées par le contrôleur
  - Pas de logique métier dans la vue

## 11. Architecture des tests

- **Tests** : Non présents dans ce dépôt (à ajouter pour la robustesse)
- **Stratégie recommandée** :
  - Tests unitaires sur les modèles
  - Tests fonctionnels sur les contrôleurs
  - Tests d’intégration via scripts externes

## 12. Déploiement

- **Topologie** :
  - Serveur web (Apache/Nginx) → PHP → MySQL
- **Configuration** :
  - `config.ini` pour la BDD
  - `composer install` pour les dépendances
- **Pas de conteneurisation ni d’orchestration détectée**

## 13. Extension et évolution

- **Ajout de fonctionnalités** :
  - Nouveau modèle/contrôleur/vue selon la convention MVC
  - Ajouter les routes dans le routeur
- **Modification** :
  - Refactoriser en extrayant des utilitaires ou en factorisant les vues
- **Intégration** :
  - Ajouter des dépendances via Composer
  - Ajouter des assets dans `public/assets/`

## 14. Exemples de patterns architecturaux

### Exemple de contrôleur

```php
class ProductController extends CoreController {
    public function list() {
        $products = Product::findAll();
        require 'app/views/product.tpl.php';
    }
}
```

### Exemple de modèle

```php
class Product extends CoreModel {
    public static function findAll() {
        // ... requête SQL et retour des résultats
    }
}
```

### Exemple de vue

```php
<!-- app/views/product.tpl.php -->
<?php foreach ($products as $product): ?>
  <div><?= htmlspecialchars($product->name) ?></div>
<?php endforeach; ?>
```

## 15. Décisions architecturales

- **Pattern MVC choisi** pour la simplicité et la clarté
- **Séparation front/back** : le back-office/API est dans un autre dépôt pour des raisons de sécurité et de responsabilité
- **Utilisation de Bootstrap/jQuery** pour accélérer l’intégration UI
- **Composer** pour la gestion des dépendances PHP

## 16. Gouvernance architecturale

- **Respect du MVC** : chaque nouvelle fonctionnalité doit suivre la séparation modèle/contrôleur/vue
- **Revue manuelle** lors des PR ou des ajouts majeurs
- **Documentation** dans `README.md` et `docs/`

## 17. Guide pour nouveaux développements

- **Workflow** :
  - Créer un modèle, un contrôleur, une vue pour chaque nouvelle entité ou fonctionnalité
  - Ajouter la route correspondante
  - Documenter dans le README ou les docs
- **Templates** :
  - S’inspirer des fichiers existants pour la structure
- **Pièges à éviter** :
  - Mettre de la logique métier dans les vues
  - Coupler trop fortement les contrôleurs et les modèles
  - Oublier la validation côté serveur

---

*Blueprint généré le 4 septembre 2025. À mettre à jour à chaque évolution majeure de l’architecture.*
