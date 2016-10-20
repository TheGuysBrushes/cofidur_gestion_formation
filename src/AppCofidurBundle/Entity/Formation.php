<?php

namespace AppCofidurBundle\Entity;

/**
 * Formation
 */
class Formation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $objectif;

    /**
     * @var string
     */
    private $moyensPedagogiques;

    /**
     * @var string
     */
    private $lieuMoyensMateriels;

    /**
     * @var string
     */
    private $typeFormation;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Formation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set objectif
     *
     * @param string $objectif
     *
     * @return Formation
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get objectif
     *
     * @return string
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set moyensPedagogiques
     *
     * @param string $moyensPedagogiques
     *
     * @return Formation
     */
    public function setMoyensPedagogiques($moyensPedagogiques)
    {
        $this->moyensPedagogiques = $moyensPedagogiques;

        return $this;
    }

    /**
     * Get moyensPedagogiques
     *
     * @return string
     */
    public function getMoyensPedagogiques()
    {
        return $this->moyensPedagogiques;
    }

    /**
     * Set lieuMoyensMateriels
     *
     * @param string $lieuMoyensMateriels
     *
     * @return Formation
     */
    public function setLieuMoyensMateriels($lieuMoyensMateriels)
    {
        $this->lieuMoyensMateriels = $lieuMoyensMateriels;

        return $this;
    }

    /**
     * Get lieuMoyensMateriels
     *
     * @return string
     */
    public function getLieuMoyensMateriels()
    {
        return $this->lieuMoyensMateriels;
    }

    /**
     * Set typeFormation
     *
     * @param string $typeFormation
     *
     * @return Formation
     */
    public function setTypeFormation($typeFormation)
    {
        $this->typeFormation = $typeFormation;

        return $this;
    }

    /**
     * Get typeFormation
     *
     * @return string
     */
    public function getTypeFormation()
    {
        return $this->typeFormation;
    }
    /**
     * @var integer
     */
    private $criticite;


    /**
     * Set criticite
     *
     * @param integer $criticite
     *
     * @return Formation
     */
    public function setCriticite($criticite)
    {
        $this->criticite = $criticite;

        return $this;
    }

    /**
     * Get criticite
     *
     * @return integer
     */
    public function getCriticite()
    {
        return $this->criticite;
    }

}
