# systemPatterns.md

## Architecture

- Pattern principal : MVC (Model-View-Controller) monolithique
- Organisation par couche : Contrôleurs, Modèles, Vues
- Routage centralisé avec AltoRouter
- Utilisation de Composer pour l’autoloading

## Décisions techniques clés

- Séparation stricte des responsabilités (pas de logique métier dans les vues)
- Un fichier par classe (modèle, contrôleur)
- Assets statiques dans `public/assets/`
- Documentation et scripts SQL dans `docs/`

## Patterns de conception

- Contrôleurs orchestrent la logique métier et l’affichage
- Modèles gèrent l’accès aux données et la logique métier
- Vues reçoivent les données et affichent le contenu

## Relations entre composants

- Contrôleur → Modèle → Base de données
- Contrôleur → Vue
- Pas de dépendances circulaires
