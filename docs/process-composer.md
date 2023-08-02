# Installation de composer

https://getcomposer.org/download/

# Utilisation dans un projet

- Créer le fichier composer.json
- Le remplir en précisant les librairies voulues et leur version
- Aller dans le terminal à la racine du projet
- Exécuter la commande : composer install
    - Vérifier que la dependance se trouve bien dans le dossier vendor
    - Si jamais on vous propose de faire "sudo apt install composer", c'est que composer n'est pas encore installé sur votre machine, alors faites le "sudo apt install composer" et récommencez le "composer install"
- L'ajout à la main dans le composer.json et le "composer install" peuvent être remplacés par "composer require la-librairie"
- Require autoload au debut du front controller (index.php)