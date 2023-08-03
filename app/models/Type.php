<?php
// Inutile maintenant grace à l'Heritage de CoreModel
 // require_once __DIR__ . './../utils/Database.php';

require_once __DIR__ . '/CoreModel.php';

class Type extends CoreModel
{
    // Propriétés

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // private $id;

    /** @var string */
    private $name;

    // private $created_at;
    // private $updated_at;

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


    /**
     * Retourne un type spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Type
     */
    public function findOne($id)
    {
        $pdo = Database::getPDO();
        // var_dump($pdo);
        $queryString = 'SELECT * FROM `type` WHERE id = ' . $id;

        $pdoStatement = $pdo->query($queryString);
        // var_dump($pdoStatement);

        $result = $pdoStatement->fetchObject('Type');

        return $result;
    }

    /**
     * Get the value of id
     */
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getId()
    // {
    //     return $this->id;
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
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getCreated_at()
    // {
    //     return $this->created_at;
    // }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function setCreated_at($created_at)
    // {
    //     $this->created_at = $created_at;

    //     return $this;
    // }

    /**
     * Get the value of updated_at
     */
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getUpdated_at()
    // {
    //     return $this->updated_at;
    // }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function setUpdated_at($updated_at)
    // {
    //     $this->updated_at = $updated_at;

    //     return $this;
    // }
}
