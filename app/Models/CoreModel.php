<?php

namespace App\Models;

class CoreModel
{
    // Propriétés 
    
    //* Rappel: Pour que les classes enfants puissent hériter des propriétés et méthodes de cette classe parent,
    //* leur visibilité doit être public ou protected
    /** @var int C'est l'identifiant unique de notre objet */
    protected $id;

    /** @var string Date de création au format Y-m-d H:i:s */
    protected $created_at;
    
    /** @var string Date de création au format Y-m-d H:i:s */
    protected $updated_at;

    // Méthodes

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
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
    public function setCreated_at($created_at): self
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
    public function setUpdated_at($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
