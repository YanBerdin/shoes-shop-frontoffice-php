<?php

// require_once __DIR__ . './../utils/Database.php';

// Heritage
// require_once __DIR__ . '/CoreModel.php';

namespace App\Models;

use App\Utils\Database;

use PDO;
// Pour les classes natives PHP, exemple PDO
use App\Models\CoreModel;



/**
 * Model servant récupérer un/des Produit(s)
 */
class Product extends CoreModel
{
    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    // private $created_at;
    // private $updated_at;
    private $brand_id;
    private $category_id;
    private $type_id;
    // ajouté suite Triple jointure
    private $brand_name;
    private $category_name;
    private $type_name;
    // Méthodes

    /**
     * Get the value of id
     */
    // Commenté => Maintenant c'est le CoreModel qui déclare ces Propriétés et Getters/Setters
    // public function getId()
    // {
    //     return $this->id;
    // }

    // Généralement pas de Setter pour un id auto incrémenté
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
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */

    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }


    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     *
     * Set the value of created_at
     * @return  self
     */
    // Commenté => Maintenant c'est le CCoreModel qui déclare ces Propriétés et Getters/Setters
    // public function setCreated_at($created_at)
    // {
    //     $this->created_at = $created_at;

    //     return $this;
    // }

    /**
     *
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

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }


    /**
     * Get the value of brand_name
     */
    public function getBrand_name()
    {
        return $this->brand_name;
    }

    /**
     * Get the value of category_name
     */
    public function getCategory_name()
    {
        return $this->category_name;
    }

    /**
     * Get the value of type_name
     */
    public function getType_name()
    {
        return $this->type_name;
    }


    /**
     * Retourne la liste de tous les produits de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Product[]
     */
    public function findAll($sort = "")
    {
        // Requete sql -> récupère les données de tous les
        // produits de la BDD

        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // Préparer la query string
        $queryString = "SELECT * FROM `product`";

        // Si un classement est demandé => l'ajouter dans la requete
        if ($sort !== "") {
            // $sql = $sql . " ORDER BY $sort";
            $queryString .= " ORDER BY $sort";
            // Par défaut les résultats sont classés par ordre ascendant
        }

        // Exécuter la requête
        $pdoStatement = $pdo->query($queryString);

        // Récupèrer les résultats (Objet de classe Product contenant les données)
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');

        return $results;
    }

    /**
     * Retourne un produit spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product
     */
    public function findOne($id)
    {
        // Connexion à la BDD en utilisant la classe Database
        $pdo = Database::getPDO();

        // ------>  V1 sans jointure
        //
        // 2. Préparer notre requête (SQL) sous forme de string
        //$queryString = 'SELECT * FROM `product` WHERE id = ' . $id;

        // ------> V2 avec triple jointure
        //
        // Objectif : récupérer le nom de la marque et de la catégorie auxquels est rattaché le produit
        // Ici, on utilisera le LEFT JOIN plutôt que INNER JOIN
        // Différence : LEFT JOIN retourne ts les produits (cad toutes les données de la table de gauche)
        // même si le produit($id) n'est rattaché à aucune marque / catégorie
        $queryString = '
        SELECT `product`.*, `brand`.name AS brand_name, `category`.`name` AS category_name, `type`.`name` AS type_name
        FROM `product`
        LEFT JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
        LEFT JOIN `category` ON `category`.`id` = `product`.`category_id`
        LEFT JOIN `type` ON `type`.`id` = `product`.`type_id`
        WHERE `product`.`id`  = ' . $id;

        // 3. Exécuter la requête
        $pdoStatement = $pdo->query($queryString);

        // 4. Récupèrer le produit (objet)
        $product = $pdoStatement->fetchObject('App\Models\Product');
        // fetchObject IDEAL sachant qu'on veut l'utiliser qu'1 fois
        // et + performant car variable inutilisée consomme de la mémoire serveur

        // 5. Retourne le résultat
        return $product;
    }

    // Se connecter à la BDD pour selectionner des produits selon l'id de leur categorie (S05-E05)
    /**
     * Retourne tous les produits liés à une catégories précise
     *
     * @param int $categoryId
     *
     * @return Product[]
     */
    public function findAllByCategory($categoryId)
    {
        // Connexion BDD
        $pdo = Database::getPDO();

        // Preparer Requête
        $sql = "SELECT * FROM `product` WHERE category_id = $categoryId";

        // Executer requête
        $pdoStatement = $pdo->query($sql);

        // Stocker l'objet de class Product
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');

        return $results;
    }

    /**
     * Retourne tous les produits liés à un type précis
     *
     * @param int $typeId
     *
     * @return Product[]
     */
    public function findAllByType($typeId)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `product` WHERE type_id = $typeId";

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');

        return $results;
    }

    /**
     * Retourne tous les produits liés à un type précis
     *
     * @param int $typeId
     *
     * @return Product[]
     */
    public function findAllByBrand($brandId)
    {
        $pdo = Database::getPDO();
        // var_dump($pdo);
        $sql = "SELECT * FROM `product` WHERE brand_id = $brandId";

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');

        return $results;

    }
}
