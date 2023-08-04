<?php
// Require De Gerard ici 
// require_once __DIR__ . './../utils/Database.php';

// Heritage
require_once __DIR__ . '/CoreModel.php';

/**
 * Model servant à gérer les marques
 */

class Brand extends CoreModel
{
    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /** @var int Identifiant unique de ma marque */
    // private $id;

    /** @var string */
    private $name;

    /** @var string Date de création au format Y-m-d H:i:s */
    // private $created_at;

    /** @var string Date de modification au format Y-m-d H:i:s */
    // private $updated_at;


    // Getters & Setters --------------------------------

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Retourne l'id de la marque / Get id's value
     *
     * @return int
     */
    // public function getId()
    // {
    //     return $this->id;
    // }

    /**
     * Permet de remplir l'id de la marque
     *
    //  * // @param int $id
    //  *
    //  * // @return self
    //  */
    // public function setId($id)
    // {
    //     $this->id = $id;
    //     return $this;
    // }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Get the value of created_at
     */
    // public function getCreatedAt()
    // {
    //     return $this->created_at;
    // }

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Set the value of created_at
     *
     * @return  self
     */
    // public function setCreatedAt($created_at)
    // {
    //     $this->created_at = $created_at;
    //     return $this;
    // }

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Get the value of updated_at
     */
    // public function getUpdatedAt()
    // {
    //     return $this->updated_at;
    // }

    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    // public function setUpdatedAt($updated_at)
    // {
    //     $this->updated_at = $updated_at;
    //     return $this;
    // }

    // Méthodes --------------------------------------------

    // Méthode pour récupérer toutes les marques
    public function findAll($sort = "")
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `brand`';

        // Si un classement est demandé => l'ajouter dans la requete
        if ($sort !== "") {
            // $sql = $sql . " ORDER BY $sort";
            $queryString .= " ORDER BY $sort";
        }

         // Exécuter la requête
        $pdoStatement = $pdo->query($queryString);
        
        // Récupèrer les résultats (Objet) contenant les données)
        // Inidiquer explicitement que les résultats récupérés seront de classe 'Brand'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');

        // Retourne le résultat
        return $results;
    }

    public function findOne($id)
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string
        $queryString = 'SELECT * FROM `brand` WHERE id = ' . $id;

        // Exécuter la requête
        $pdoStatement = $pdo->query($queryString);

        // Récupèrer les résultats (Objet de classe Brand contenant les données)
        $result = $pdoStatement->fetchObject('Brand');
        // fetchObject IDEAL sachant qu'on veut l'utiliser qu'1 fois
        // et + performant car variable inutilisée consomme de la mémoire serveur

        // 5. On retourne le résultat
        return $result;
    }
}
