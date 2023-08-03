<?php

/**
 * Model servant à gérer les catégories
 */
class Category
{
    private $id;

    private $name;

    private $subtitle;

    private $picture;

    private $home_order;

    private $created_at;

    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getHomeOrder()
    {
        return $this->home_order;
    }

    public function setHomeOrder($home_order): self
    {
        $this->home_order = $home_order;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD
     *
     * @return Category[]
     */
    public function findAll()
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM `category`");

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
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

        $pdoStatement = $pdo->query("SELECT * FROM `category` WHERE id=$id");
        //                      =   'SELECT * FROM `category` WHERE id = ' . $id;
        // Idéalement, ici je devrai vérifier que $pdoStatement n'est pas false
        // avant de faire le fetch

        return $pdoStatement->fetchObject('Category');
    }
}