# `Projet Shoes Shop`

- PHP
- MySQL
- HTML & CSS
- Composer
- AltoRouter
- Bootstrap
 
## `Description du projet`

Intégration de l'interface utilisateur d'un site e-commerce : une boutique de chaussures.
Le BackOffice/API est dans un autre repository

## `Pour installer cette app, suivez les étapes suivantes :`

1. Assurez-vous d'avoir PHP, MySQL, Composer et un serveur web (comme Apache) installés sur votre machine.
2. Clonez ce dépôt dans le répertoire de votre choix.
3. Importez la base de données fournie dans le fichier `database.sql` dans votre serveur MySQL.
4. Ouvrez le fichier `config.ini` et configurez les paramètres de connexion à votre base de données.
5. Exécutez la commande `composer install` pour installer les dépendances.
6. Démarrez votre serveur web et accédez à l'application via votre navigateur.

### `Sur toutes les pages`

Navigation principale :

- Retour à l'accueil.
- Les catégories.
- Les types de produits.
- Les marques.

### `Catalogue`

- Une page d'accueil (avec 5 catégories mises en avant).
- Une page des produits pour chaque catégorie (Détente, En ville, Au travail).
  - Une pagination sera présente.
  - La possibilité de filtrer par nom, note, ou prix.
- Une page produit.
- Une page des produits pour chaque type de produits (Chaussons, Escarpins, Talons aiguilles).
- Une page des produits pour chaque marque.

### `Back-office`

Zone réservée aux administrateurs _métier_ et techniques du site.

- L'accès à cette zone nécessite de se connecter avec son compte
- Les échanges entre le navigateur et le serveur Web sont chiffrés par soucis de confidentialité & sécurité
- Gestion des catégories (liste, ajout, modification, suppression)
- Gestion des produits (liste, ajout, modification, suppression)
- Gestion des types de produits (liste, ajout, modification, suppression)
- Gestion des marques (liste, ajout, modification, suppression)
- Gestion des commandes (liste + changement du statut payé-envoyé-annulé-retourné)
- Gestion des 5 catégories en page d'accueil
- Gestion des utilisateurs du back-office
  - 2 types d'utilisateurs :
    - `catalog manager` pouvant gérer les données sur les produits du site (y compris catégories, types et marque)
    - `admin` pouvant, en plus de ce que peut faire un `catalog manager`, modifier le statut des commandes et créer des utilisateurs

## `Documents techniques`

- [User stories](docs/user_stories.md)
- [Intégration HTML/CSS](docs/html-css/)

