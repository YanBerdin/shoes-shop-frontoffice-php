<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à récupérer les données selon leur catégorie
 */
class Category extends CoreModel
{
    /** @var int Identifiant unique de la categorie */
    // private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $subtitle;

    private $picture;

    /** @var int Ordre de placement sur la page Home */
    private $home_order;

    // Méthodes

    /**
     * Get the name of the category.
     *
     * @return string The name of the category.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the category.
     *
     * @param string $name The name of the category.
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the subtitle of the category.
     *
     * @return string|null The subtitle of the category, or null if it doesn't have a subtitle.
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the subtitle of the category.
     *
     * @param string $subtitle The subtitle to set.
     * @return self
     */
    public function setSubtitle($subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * Get the picture for the category.
     *
     * @return string|null The picture URL or null if no picture is set.
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the picture for the category.
     *
     * @param string $picture The picture path or URL.
     * @return self
     */
    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * Get the home order for the category.
     *
     * @return int
     */
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the home order for the category.
     *
     * @param int $home_order The home order value.
     * @return self
     */
    public function setHomeOrder($home_order): self
    {
        $this->home_order = $home_order;
        return $this;
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel filtrer
     *
     * @return Category[]
     */
    public function findAll($sort = "")
    {
        $pdo = Database::getPDO();

        $queryString = 'SELECT * FROM `category`';

        // Liste des champs autorisés pour le tri
        $allowedSortFields = ['id', 'name', 'subtitle', 'picture', 'home_order', 'created_at', 'updated_at'];

        if (in_array($sort, $allowedSortFields)) {
            $queryString .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($queryString);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

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
        $pdo = Database::getPDO();

        $queryString = "SELECT * FROM `category` WHERE `id` =:id";

        $pdoStatement = $pdo->prepare($queryString);

        $pdoStatement->execute([':id' => $id]);

        if ($pdoStatement !== false) {
            $result = $pdoStatement->fetchObject(Category::class);
            return $result;
        }
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD à afficher sur la
     * homepage, dans le bon ordre
     *
     * @return Category[]
     */
    public function findByHomeOrder()
    {
        $pdo = Database::getPDO();

        $queryString = "
    SELECT *
    FROM `category`
    WHERE `home_order`> 0
    ORDER BY `home_order`
    LIMIT 5";

        $pdoStatement = $pdo->query($queryString);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $results;
    }
}
