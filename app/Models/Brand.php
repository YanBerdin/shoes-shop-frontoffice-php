<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à gérer les marques
 */

class Brand extends CoreModel
{
    /** @var int Identifiant unique de ma marque */
    // private $id;

    // private = les enfants ne pourront hériter de $name
    /** @var string */
    private $name;

    /** @var string Date de création au format Y-m-d H:i:s */
    // private $created_at;

    /** @var string Date de modification au format Y-m-d H:i:s */
    // private $updated_at;


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

    /**
     * Retourne la liste de toutes les marques de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Brand[]
     */
    public function findAll($sort = "")
    {
        $pdo = Database::getPDO();
        $queryString = 'SELECT * FROM `brand`';

        // Si classement demandé => l'ajouter dans la requete
        // => validation (sinon nettoyage)
        $allowedSortFields = ['id', 'name', 'created_at', 'updated_at'];

        if (in_array($sort, $allowedSortFields)) {
            $queryString .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($queryString);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);
        return $results;
    }


    /**
     * Retourne une marque spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Brand
     */
    public function findOne($id)
    {
        $pdo = Database::getPDO();

        // Interpolation (risque Injection SQL)
        // $queryString = 'SELECT * FROM `brand` WHERE id = ' . $id;
        $queryString = "SELECT * FROM `brand` WHERE `id` =:id";

        $pdoStatement = $pdo->prepare($queryString);

        $pdoStatement->execute([':id' => $id]);
        //TODO $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        //TODO $pdoStatement->execute();

        // fetchObject + performant (variable inutilisée consomme de la mémoire serveur)
        $result = $pdoStatement->fetchObject(Brand::class);


        return $result;
    }
}
