<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à récupérer les données selon leur type
 */
class Type extends CoreModel
{
    // Propriétés

    /** @var string */
    private $name;

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
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    // Méthodes

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

        $queryString = 'SELECT * FROM `type` WHERE id = :id';

        $pdoStatement = $pdo->prepare($queryString);

        $pdoStatement->execute([':id' => $id]);

        $result = $pdoStatement->fetchObject(Type::class);

        return $result;
    }

    /**
     * Retourne la liste de tous les types de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Type[]
     */
    // public function findAll()
    public function findAll($sort = "")
    {
        $pdo = Database::getPDO();

        $queryString = 'SELECT * FROM `type`';

        // Liste des champs autorisés pour le tri
        $allowedSortFields = ['id', 'name', 'created_at', 'updated_at'];

        // validation
        if (in_array($sort, $allowedSortFields)) {
            $queryString .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($queryString);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $results;
    }
}
