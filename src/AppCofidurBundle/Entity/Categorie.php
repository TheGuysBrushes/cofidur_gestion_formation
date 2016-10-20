<?php
namespace AppCofidurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Categorie
{
    protected $description;

    protected $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTaches()
    {
        return $this->taches;
    }
}