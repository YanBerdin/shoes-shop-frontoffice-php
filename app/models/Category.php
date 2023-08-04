<?php
// Require De Gerard ici 
// require_once __DIR__ . './../Utils/Database.php';

// Heritage
require_once __DIR__ . '/CoreModel.php';

/**
 * Model servant à gérer les catégories
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

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
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

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getCreatedAt()
    // {
    //     return $this->created_at;
    // }

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function setCreatedAt($created_at): self
    // {
    //     $this->created_at = $created_at;
    //     return $this;
    // }

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getUpdatedAt()
    // {
    //     return $this->updated_at;
    // }

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function setUpdatedAt($updated_at): self
    // {
    //     $this->updated_at = $updated_at;
    //     return $this;
    // }

    /**
     * Retourne la liste de toutes les catégories de la BDD
     *
     * @return Category[]
     */
    public function findAll($sort = "")
    {
        // 1. On se connecte à la BDD
        $pdo = Database::getPDO();

        // 2. On fait (prépare) notre requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `category`';

        // besoin d'ordonner la liste => ajout de parametre à la requete SQL
        if ($sort !== "") {
            // $sql = $sql . "ORDER BY $sort";
            $queryString .= " ORDER BY $sort";
        }


        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString);

        // 4. On récupère tous les résultats
        // On dit explicitement que les résultats récupérés seront de type 'Category'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');

        // 5. On retourne les résultats
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
        // 1. Connexion à la BDD
        $pdo = Database::getPDO();

        // 2. On écrit la query string
        $queryString = 'SELECT * FROM `category` WHERE id = ' . $id;
        //       idem  "SELECT * FROM `category` WHERE id=$id");

        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString);
        // Idéalement, ici je devrais vérifier que $pdoStatement n'est pas false
        // avant de faire le fetch

        // 4. On récupère la catégorie
        $result = $pdoStatement->fetchObject('Category');

        // 5. On retourne le résultat
        return $result;
    }
}
