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

    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // private $id;

    /** @var string */
    private $name;

    // private $created_at;
    // private $updated_at;

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
    public function setName($name): self
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
        // var_dump($pdo);
        //? Interpolation (risque Injection SQL)
        //? $queryString = 'SELECT * FROM `type` WHERE id = ' . $id;
        $queryString = 'SELECT * FROM `type` WHERE id = :id';

        // Préparer la requête
        $pdoStatement = $pdo->prepare($queryString);

        // Exécuter la requête
        // $pdoStatement = $pdo->query($queryString);
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

        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string
        $queryString = 'SELECT * FROM `type`';

        //? les requêtes préparées ne sont généralement pas utilisées pour les noms de champs ou de tables
        //! => validation ou nettoyage

        // Si un classement est demandé => l'ajouter dans la requete
        //? if ($sort !== "") {
        // $sql = $sql . " ORDER BY $sort";
        //? $queryString .= " ORDER BY $sort";
        // Par défaut les résultats sont classés par ordre ascendant
        //? }

        //! Liste des champs autorisés pour le tri
        $allowedSortFields = ['id', 'name', 'created_at', 'updated_at'];

        //! => validation
        if (in_array($sort, $allowedSortFields)) {
            $queryString .= " ORDER BY $sort";
        }

        // Exécuter la requête
        $pdoStatement = $pdo->query($queryString);

        // Récupèrer les résultats (Objet contenant les données)
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        // Retourne le résultat
        return $results;
    }
}
