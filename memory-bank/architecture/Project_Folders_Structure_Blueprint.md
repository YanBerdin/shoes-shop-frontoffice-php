# Project_Folders_Structure_Blueprint.md

## 1. Phase d’auto-détection initiale

### Type de projet détecté

- **Type principal** : PHP (architecture MVC personnalisée)
- **Front-end** : HTML/CSS/JS statique, pas de framework JS moderne détecté
- **Backend** : PHP, structure orientée contrôleur-modèle-vue
- **Gestion de dépendances** : `composer.json` (PHP Composer)
- **Pas de microservices** : Structure monolithique
- **Pas de monorepo** : Un seul projet principal

### Indicateurs de structure

- Contrôleurs, modèles, vues séparés dans `app/`
- Fichiers de configuration et d’entrée dans `public/` et racine
- Assets frontaux dans `public/assets/` et `docs/html-css/`
- Documentation dans `docs/`

## 2. Vue d’ensemble structurelle

- **Organisation par couche** :
  - Contrôleurs (logique de routage)
  - Modèles (accès aux données)
  - Vues (affichage)
- **Organisation des assets** :
  - Séparation claire entre code source, ressources statiques et documentation
- **Répétition de motifs** :
  - Fichiers `.tpl.php` pour chaque vue
  - Modèles et contrôleurs nommés selon l’entité métier

## 3. Visualisation de l’arborescence (Markdown List, profondeur 3)

- app/
  - Controllers/
    - CatalogController.php
    - CoreController.php
    - ...
  - Models/
    - Brand.php
    - Category.php
    - ...
  - Utils/
    - Database.php
  - views/
    - catalog-brand.tpl.php
    - ...
- public/
  - index.php
  - assets/
    - css/
    - fonts/
    - images/
    - js/
- docs/
  - database.sql
  - ...
- composer.json
- README.md

## 4. Analyse des dossiers clés

### app/

- **Controllers/** : Logique de routage, un contrôleur par domaine métier
- **Models/** : Accès aux données, une classe par table principale
- **Utils/** : Utilitaires partagés (ex : connexion BDD)
- **views/** : Templates d’affichage, un fichier par vue ou page

### public/

- **index.php** : Point d’entrée de l’application
- **assets/** : Ressources statiques (CSS, JS, images, polices)

### docs/

- Documentation technique, scripts SQL, guides de modélisation

## 5. Motifs de placement des fichiers

- **Fichiers de config** : Racine (`composer.json`), `public/index.php`
- **Modèles** : `app/Models/`
- **Contrôleurs** : `app/Controllers/`
- **Vues** : `app/views/`
- **Assets** : `public/assets/`
- **Tests** : Non détecté (à ajouter si besoin)
- **Documentation** : `docs/`

## 6. Conventions de nommage et d’organisation

- **Fichiers** : PascalCase pour classes PHP, kebab-case pour assets statiques
- **Dossiers** : CamelCase pour dossiers de code, minuscules pour assets
- **Templates** : Suffixe `.tpl.php` pour les vues
- **Organisation** : Par couche (MVC), chaque entité a son modèle, contrôleur, vue

## 7. Navigation et workflow de développement

- **Point d’entrée** : `public/index.php`
- **Ajout de fonctionnalités** :
  - Nouveau modèle dans `app/Models/`
  - Nouveau contrôleur dans `app/Controllers/`
  - Nouvelle vue dans `app/views/`
- **Modification de la config** : `composer.json`, `public/index.php`
- **Ajout d’assets** : `public/assets/`
- **Documentation** : Ajouter dans `docs/`

## 8. Organisation du build et des outputs

- **Build** : Pas de build automatisé détecté (projet PHP classique)
- **Sortie** : Fichiers servis depuis `public/`
- **Différences dev/prod** : Non gérées nativement (à documenter si besoin)

## 9. Organisation spécifique PHP

- **Organisation des classes** : Un fichier par classe, nom du fichier = nom de la classe
- **Gestion des dépendances** : Composer (`composer.json`)
- **Ressources** : Statique dans `public/assets/`, dynamique via modèles

## 10. Extension et évolution

- **Extension** : Ajouter de nouveaux modèles/contrôleurs/vues selon la convention existante
- **Scalabilité** : Possibilité de regrouper par domaine si le projet grandit
- **Refactoring** : Extraire des utilitaires dans `app/Utils/`, factoriser les vues communes

## 11. Templates de structure (exemples)

### Nouveau modèle

- `app/Models/NomDuModele.php`

### Nouveau contrôleur

- `app/Controllers/NomDuControleur.php`

### Nouvelle vue

- `app/views/nom-de-la-vue.tpl.php`

### Nouvel asset

- `public/assets/css/nom-style.css`
- `public/assets/js/nom-script.js`

## 12. Enforcement de la structure

- **Validation** : Convention manuelle, pas d’outil d’enforcement détecté
- **Documentation** : Historique et décisions dans `docs/`
- **Évolution** : Mettre à jour ce blueprint à chaque refonte structurelle

---
