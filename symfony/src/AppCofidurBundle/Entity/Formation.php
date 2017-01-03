<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppCofidurBundle\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="criticality", type="integer")
     */
    private $criticality;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="goal", type="string", length=255)
     */
    private $goal;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="string", length=255)
     */
    private $sector;

    /**
     * @var string
     *
     * @ORM\Column(name="teachingAids", type="string", length=255)
     */
    private $teachingAids;

    /**
     * @var string
     *
     * @ORM\Column(name="placesMaterialRessources", type="string", length=255)
     */
    private $placesMaterialRessources;

     /**
     * @var ArrayCollection $categories
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="formation", cascade={"remove"})
     * @ORM\OrderBy({"ordre" = "ASC"})
     */
    private $categories;

    /**
     * @var integer
     *
     * @ORM\Column(name="validityTime", type="integer")
     */
    private $validityTime;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set criticality
     *
     * @param integer $criticality
     *
     * @return Formation
     */
    public function setCriticality($criticality)
    {
        $this->criticality = $criticality;

        return $this;
    }

    /**
     * Get criticality
     *
     * @return integer
     */
    public function getCriticality()
    {
        return $this->criticality;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Formation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Set reference
     *
     * @param string $reference
     *
     * @return Formation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set goal
     *
     * @param string $goal
     *
     * @return Formation
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;

        return $this;
    }

    /**
     * Get goal
     *
     * @return string
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Set sector
     *
     * @param string $sector
     *
     * @return Formation
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set teachingAids
     *
     * @param string $teachingAids
     *
     * @return Formation
     */
    public function setTeachingAids($teachingAids)
    {
        $this->teachingAids = $teachingAids;

        return $this;
    }

    /**
     * Get teachingAids
     *
     * @return string
     */
    public function getTeachingAids()
    {
        return $this->teachingAids;
    }

    /**
     * Set placesMaterialRessources
     *
     * @param string $placesMaterialRessources
     *
     * @return Formation
     */
    public function setPlacesMaterialRessources($placesMaterialRessources)
    {
        $this->placesMaterialRessources = $placesMaterialRessources;

        return $this;
    }

    /**
     * Get placesMaterialRessources
     *
     * @return string
     */
    public function getPlacesMaterialRessources()
    {
        return $this->placesMaterialRessources;
    }

    /**
     * Get validityTime
     *
     * @return integer
     */
    public function getValidityTime(){
        return $this->validityTime;
    }

    /**
     * Set validityTime
     *
     * @param  integer $validity_time
     *
     * @return Formation
     */
    public function setValidityTime($validity_time)
    {
        $this->validityTime= $validity_time;

        return $this;
    }

    /**
     * Add category
     *
     * @param \AppCofidurBundle\Entity\Category $category
     *
     * @return Formation
     */
    public function addCategory(\AppCofidurBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppCofidurBundle\Entity\Category $category
     */
    public function removeCategory(\AppCofidurBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
