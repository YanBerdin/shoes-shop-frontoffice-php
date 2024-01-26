<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à gérer les marques
 */

class Brand extends CoreModel
{
    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /** @var int Identifiant unique de ma marque */
    // private $id;

    // private = les enfants ne pourront hériter de $name
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
    public function setName($name): self
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


    /**
     * Retourne la liste de toutes les marques de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Brand[]
     */
    public function findAll($sort = "")
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `brand`';

        // Si un classement est demandé => l'ajouter dans la requete

        //? les requêtes préparées ne sont généralement pas utilisées pour les noms de champs ou de tables
        //! => validation ou nettoyage

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

        // Récupèrer les résultats (Objet) contenant les données)
        // Inidiquer explicitement que les résultats récupérés seront de classe 'Brand'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        // Retourne le résultat
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
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Définir la query string
        //? Interpolation (risque Injection SQL)
        //? $queryString = 'SELECT * FROM `brand` WHERE id = ' . $id;
        $queryString = "SELECT * FROM `brand` WHERE `id` =:id";

        //? Préparer la requête
        $pdoStatement = $pdo->prepare($queryString);

        // Exécuter la requête
        // $pdoStatement = $pdo->query($queryString);
        //? Lier le paramètre ':id' à la variable $id
        $pdoStatement->execute([':id' => $id]);

        //FIXME: ALEC => Faut il utiliser ici bindvalue() ??
        //TODO ? $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        //TODO ? $pdoStatement->execute();

        // Récupèrer les résultats (Objet de classe Brand contenant les données)
        $result = $pdoStatement->fetchObject(Brand::class);

        // fetchObject IDEAL sachant qu'on veut l'utiliser qu'1 fois
        // et + performant car variable inutilisée consomme de la mémoire serveur

        return $result;
    }
}
