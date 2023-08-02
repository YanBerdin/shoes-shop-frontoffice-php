<?php
require_once __DIR__ . './../Utils/Database.php';

class Type 
{
    // Propriétés
    private $id;
    private $name;
    private $created_at;
    private $updated_at;

    // Méthodes

    public function findAll()
    {
        // On se connecte à la BDD
        $pdo = Database::getPDO();

        // On prépare la query string
        $queryString = 'SELECT * FROM `type`';

        // On exécute la requête
        $pdoStatement = $pdo->query($queryString);

        // On récupère les résultats
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');

        // On retourne les résultats
        return $results;
    }

    public function findOne($id)
    {
        $pdo = Database::getPDO();

        $queryString = 'SELECT * FROM `type` WHERE id = ' . $id;

        $pdoStatement = $pdo->query($queryString);

        $result = $pdoStatement->fetchObject('Type');

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

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
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}