# Guide d’extension et d’évolution

- **Ajout d’une entité métier** :
  - Créer un modèle dans `app/Models/` (ex : `Order.php`)
  - Créer un contrôleur dans `app/Controllers/` (ex : `OrderController.php`)
  - Créer une ou plusieurs vues dans `app/views/` (ex : `order-list.tpl.php`, `order-detail.tpl.php`)
  - Ajouter la route correspondante dans la configuration du routeur
  - Documenter la nouvelle fonctionnalité dans le Memory Bank et le `README.md`

- **Ajout d’un asset** :
  - Placer les fichiers CSS dans `public/assets/css/`
  - Placer les fichiers JS dans `public/assets/js/`
  - Placer les images dans `public/assets/images/`

- **Ajout d’une dépendance PHP** :
  - Ajouter la dépendance dans `composer.json`
  - Exécuter `composer install`
  - Documenter l’usage de la dépendance dans le Memory Bank

## Bonnes pratiques et pièges à éviter

- Ne jamais placer de logique métier dans les vues
- Ne pas coupler directement les modèles et les vues
- Toujours valider les entrées côté serveur (dans les contrôleurs ou modèles)
- Garder une documentation à jour pour chaque évolution
- Utiliser le Memory Bank comme source unique de vérité pour l’architecture et les décisions

## FAQ et ressources complémentaires

- **Installation** : Voir le `README.md` pour les prérequis et la procédure d’installation
- **Modélisation BDD** : Voir `docs/modelisation_bdd.md` pour le schéma conceptuel et logique
- **User stories** : Voir `docs/user_stories.md`
- **Intégration HTML/CSS** : Voir `docs/html-css/`

---

*Pour toute contribution, merci de respecter la structure, les conventions et de documenter vos changements dans le Memory Bank.*
