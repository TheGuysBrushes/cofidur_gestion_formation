<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OperatorCategory
 *
 * @ORM\Table(name="operator_category")
 * @ORM\Entity(repositoryClass="AppCofidurBundle\Repository\OperatorCategoryRepository")
 */
class OperatorCategory
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
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSignature", type="date", nullable=true)
     */
    private $dateSignature;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255, nullable=true)
     */
    private $signature;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nbHours", type="time", nullable=true)
     */
    private $nbHours;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="trainer_id", referencedColumnName="id")
     */
    private $trainer;

    /**
     * @var OperatorFormation $operatorformation
     *
     * @ORM\ManyToOne(targetEntity="OperatorFormation", inversedBy="operatorcategories")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="operator_formation_id", referencedColumnName="id")
     * })
     */
    private $operatorformation;

     /**
     * @var ArrayCollection $operatortasks
     *
     * @ORM\OneToMany(targetEntity="OperatorTask", mappedBy="operatorcategory", cascade={"remove"})
     */
    private $operatortasks;

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
     * Set category
     *
     * @param category $category
     *
     * @return OperatorCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * Set dateSignature
     *
     * @param \DateTime $dateSignature
     *
     * @return OperatorCategory
     */
    public function setDateSignature($dateSignature)
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return \DateTime
     */
    public function getDateSignature()
    {
        return $this->dateSignature;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return OperatorCategory
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set nbHours
     *
     * @param \DateTime $nbHours
     *
     * @return OperatorCategory
     */
    public function setNbHours($nbHours)
    {
        $this->nbHours = $nbHours;

        return $this;
    }

    /**
     * Get nbHours
     *
     * @return \DateTime
     */
    public function getNbHours()
    {
        return $this->nbHours;
    }

    /**
     * Set trainer
     *
     * @param User $trainer
     *
     * @return OperatorCategory
     */
    public function setTrainer($trainer)
    {
        $this->trainer = $trainer;

        return $this;
    }

    /**
     * Get trainer
     *
     * @return User
     */
    public function getTrainer()
    {
        return $this->trainer;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operatortasks = new ArrayCollection();
    }

    /**
     * Set operatorformation
     *
     * @param OperatorFormation $operatorformation
     *
     * @return OperatorCategory
     */
    public function setOperatorformation(OperatorFormation $operatorformation = null)
    {
        $this->operatorformation = $operatorformation;

        return $this;
    }

    /**
     * Get operatorformation
     *
     * @return OperatorFormation
     */
    public function getOperatorformation()
    {
        return $this->operatorformation;
    }

    /**
     * Add operatortask
     *
     * @param OperatorTask $operatortask
     *
     * @return OperatorCategory
     */
    public function addOperatortask(OperatorTask $operatortask)
    {
        $this->operatortasks[] = $operatortask;

        return $this;
    }

    /**
     * Remove operatortask
     *
     * @param OperatorTask $operatortask
     */
    public function removeOperatortask(OperatorTask $operatortask)
    {
        $this->operatortasks->removeElement($operatortask);
    }

    /**
     * Get operatortasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperatortasks()
    {
        return $this->operatortasks;
    }
}
