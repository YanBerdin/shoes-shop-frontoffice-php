<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à récupérer les données selon leur catégorie
 */
class Category extends CoreModel
{
    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /** @var int Identifiant unique de la categorie */
    // private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $subtitle;

    private $picture;

    /** @var int Ordre de placement sur la page Home */
    private $home_order;

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /** @var string Date de création au format Y-m-d H:i:s */
    // private $created_at;

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /** @var string Date de création au format Y-m-d H:i:s */
    // private $updated_at;

    // Méthodes

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function setId($id): self
    // {
    //     $this->id = $id;
    //     return $this;
    // }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getHomeOrder()
    {
        return $this->home_order;
    }

    public function setHomeOrder($home_order): self
    {
        $this->home_order = $home_order;
        return $this;
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Category[]
     */
    public function findAll($sort = "")
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer notre requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `category`';

        // Si un classement est demandé => l'ajouter dans la requete

        //? les requêtes préparées ne sont généralement pas utilisées pour les noms de champs ou de tables
        //! => validation ou nettoyage

        //? if ($sort !== "") {
        // $sql = $sql . "ORDER BY $sort";
        //? $queryString .= " ORDER BY $sort";
        // Par défaut les résultats sont classés par ordre ascendant
        //? }

        //! Liste des champs autorisés pour le tri
        $allowedSortFields = ['id', 'name', 'subtitle', 'picture', 'home_order', 'created_at', 'updated_at'];

        //! => validation
        if (in_array($sort, $allowedSortFields)) {
            $queryString .= " ORDER BY $sort";
        }

        // Exécuter la requête
        $pdoStatement = $pdo->query($queryString);

        // Récupèrer tous les résultats
        // On dit explicitement que les résultats récupérés seront de type 'Category'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $results;
    }


    /**
     * Retourne une catégorie spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Category
     */
    public function findOne($id)  // voir find() vs finfOne()
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string
        //? Interpolation (risque Injection SQL)
        // $queryString = 'SELECT * FROM `category` WHERE id = ' . $id;
        //?       idem  
        //? $queryString = "SELECT * FROM `category` WHERE id=$id";
        $queryString = "SELECT * FROM `category` WHERE `id` =:id";

        // Préparer la requête
        $pdoStatement = $pdo->prepare($queryString);

        // Exécuter la requête
        // $pdoStatement = $pdo->query($queryString);
        $pdoStatement->execute([':id' => $id]);

        // Idéalement, ici je devrais vérifier que $pdoStatement n'est pas false
        // avant de faire le fetch

        // Récupèrer les résultats (Objet de classe Product contenant les données)
        $result = $pdoStatement->fetchObject(Category::class);

        // Retourne le résultat
        return $result;
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD à afficher sur la
     * homepage, dans le bon ordre
     *
     * @return Category[]
     */
    public function findByHomeOrder()
    {
        $pdo = Database::getPDO();

        $queryString = "
    SELECT *
    FROM `category`
    WHERE `home_order`> 0
    ORDER BY `home_order`
    LIMIT 5";

        $pdoStatement = $pdo->query($queryString);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $results;
    }
}
