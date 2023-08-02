<?php
require_once __DIR__ . './../utils/Database.php';
/**
 * Model servant à gérer les marques
 */

class Brand
{
    /** @var int Identifiant unique de ma marque */
    private $id;

    /** @var string */
    private $name;

    /** @var string Date de création au format Y-m-d H:i:s */
    private $created_at;

    /** @var string Date de modification au format Y-m-d H:i:s */
    private $updated_at;

    /**
     * Retourne l'id de la marque / Get id's value
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Permet de remplir l'id de la marque
     *
     * // @param int $id
     *
     * // @return self
     */
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

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    // Méthodes
    // Méthode pour récupérer toutes les marques

    public function findAll()
    {
        // 1. On se connecte à la BDD
        $pdo = Database::getPDO();

        // 2. On fait (prépare) notre requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `brand`';

        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString);

        // 4. On récupère tous les résultats
        // On dit explicitement que les résultats récupérés seront de type 'Brand'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');

        // 5. On retourne les résultats
        return $results;
    }

    public function findOne($id)
    {
        // 1. Connexion à la BDD
        $pdo = Database::getPDO();

        // 2. On écrit la query string
        $queryString = 'SELECT * FROM `brand` WHERE id = ' . $id;

        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString);

        // 4. On récupère la marque
        $result = $pdoStatement->fetchObject('Brand');
        // fetchObject IDEAL sachant qu'on veut l'utiliser qu'1 fois
        // et + performant car variable inutilisée consomme de la mémoire serveur

        // 5. On retourne le résultat
        return $result;
    }
}
