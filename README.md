# Projet _Dans les "shoe"_

## Description du projet

Un client veut créer un site de e-commerce, en l'occurence une boutique en ligne de chaussures.
Le site va probablement s'appeller _Dans les "shoe"_, mais le nom de code du projet est pour l'instant : **oShop**.

Oui, il y a déjà beaucoup de concurrence sur le marché, mais le client est en fait un groupement de plusieurs marques de chaussures qui ne sont pas encore présentes sur internet. Et ces marques ne souhaitent pas dépendre d'une autre société pour la distribution, telle que [Sarenza](https://fr.wikipedia.org/wiki/Sarenza) ou un de ses concurrents.

## Brief client

> Ce brief sera utilisé pour définir les différentes étapes et tâches nécessaires à la conception et à la réalisation du projet.

### Sur toutes les pages

Navigation principale :

- Retour à l'accueil.
- Les catégories.
- Les types de produits.
- Les marques.

En bas de chaque page, il y aura :

- Le nom de la boutique.
- Le slogan.
- Les liens vers les les réseaux sociaux.
- La mise en avant du fait que livraison et retours sont gratuits, que les clients ont 30 jours pour renvoyer leur produit, que les internautes peuvent contacter notre service client au 01 02 03 04 05 de 8h à 19h, du lundi au vendredi.
- Un formulaire d'inscription à la newsletter.

### Catalogue

Voici le contenu du site prévu pour l'instant :

- Une page d'accueil (avec 5 catégories mises en avant).
- Une page des produits pour chaque catégorie (Détente, En ville, Au travail).
  - Une pagination sera présente.
  - La possibilité de filtrer par nom, note, ou prix.
- Une page produit.
- Une page des produits pour chaque type de produits (Chaussons, Escarpins, Talons aiguilles).
- Une page des produits pour chaque marque.

### Panier d'achat

_Sortie de ce brief pour des raisons de lisibilité._

### Commande

_Sortie de ce brief pour des raisons de lisibilité._

### Back-office

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

## Documents techniques

- [User stories](docs/user_stories.md)
- [Product backlog](docs/product_backlog.md)
- [Intégration HTML/CSS](docs/html-css/)

## Organisation

L'organisation pour le développement du site est horizontale, et suit la méthode agile _Scrum_ (développement itératif par _Sprints_).

Il y a des rôles prédéfinis. Quel que soit son rôle, on ne donne d'ordre à personne : chaque personne qui assume un rôle s'occupe de sa partie, de ses responsabilités, et se coordonne avec les autres si besoin.

### Product Owner

Fiche récap : https://kourou.oclock.io/ressources/fiche-recap/scrum/#product-owner

Fanny

Le Product Owner est l'unique rédacteur du _Product Backlog_.
Le Product Owner peut aider les développeurs pour clarifier certaines fonctionnalités, répondre aux questions sur le projet.

### Scrum Master

Fiche récap : https://kourou.oclock.io/ressources/fiche-recap/scrum/#scrum-master

Le prof de chaque cockpit tiendra le rôle de Scrum Master.

Le Scrum Master est une aide, un support aux autres membres de l'équipe, pour s'assurer que tout le monde suive bien la méthodologie _Scrum_.

### Developer

Fiche récap : https://kourou.oclock.io/ressources/fiche-recap/scrum/#%c3%a9quipe

Le prof de chaque cockpit et les étudiants tiennent le rôle de développeur.

Lors du _Sprint Planning_, les développeurs sont les seuls à décider quels éléments du _Product Backlog_ sont à intégrer au _Sprint Backlog_. Pour cela, ils prennent en compte l'importance de chaque élément pour essayer de les réaliser en priorité.
Lors du _Sprint Planning_, les développeurs peuvent utiliser le _Planning Poker_ ([fiche récap](https://kourou.oclock.io/ressources/fiche-recap/scrum/#sprint-planning)) pour déterminer l'effort (la difficulté, la complexité) pour chaque élément du _Product Backlog_ (il n'est pas nécessaire de passer sur toutes les user stories).

### Sprints

Chaque _Sprint_ va durer une "saison", soit 8 jours.

À la fin de chaque _Sprint_ sera livré un _Incrément_ du projet, contenant les fonctionnalités mises en place pendant ce _Sprint_ (_Sprint Backlog_).

### Daily Scrum

Chaque début de journée, les _Developers_ organisent un _Daily Scrum_ "lite" (léger) afin de savoir :

- Ce que chacun a fait la veille.
- Ce que chacun compte faire aujourd'hui.
- Ce qui nous bloque, si quelque chose nous bloque.

## Versions du projet

Le logiciel de versionning pour ce projet sera _Git_.

**Chaque fonctionnalité sera codée dans une branche séparée**.
Lorsque la fonctionnalité est terminée, une _Pull Request_, avec 3 à 4 reviewers parmi les _Developers_, sera créée afin de garantir la qualité du code. Une fois validée, la _Pull Request_ pourra être fusionnée dans la branche `master`.

## Documentation

La documentation technique devra être rédigée **en anglais**.
