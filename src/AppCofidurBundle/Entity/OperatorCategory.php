<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="idCategory", type="integer")
     */
    private $idCategory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSignature", type="date", nullable=true)
     */
    private $dateSignature;

    /**
     * @var bool
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
     * @var int
     *
     * @ORM\Column(name="idTrainer", type="integer", nullable=true)
     */
    private $idTrainer;

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
     * Set idCategory
     *
     * @param integer $idCategory
     *
     * @return OperatorCategory
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return int
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }
    /**


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
     * @param boolean $signature
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
     * @return bool
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
     * Set idTrainer
     *
     * @param integer $idTrainer
     *
     * @return OperatorCategory
     */
    public function setIdTrainer($idTrainer)
    {
        $this->idTrainer = $idTrainer;

        return $this;
    }

    /**
     * Get idTrainer
     *
     * @return int
     */
    public function getIdTrainer()
    {
        return $this->idTrainer;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operatortasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set operatorformation
     *
     * @param \AppCofidurBundle\Entity\OperatorFormation $operatorformation
     *
     * @return OperatorCategory
     */
    public function setOperatorformation(\AppCofidurBundle\Entity\OperatorFormation $operatorformation = null)
    {
        $this->operatorformation = $operatorformation;

        return $this;
    }

    /**
     * Get operatorformation
     *
     * @return \AppCofidurBundle\Entity\OperatorFormation
     */
    public function getOperatorformation()
    {
        return $this->operatorformation;
    }

    /**
     * Add operatortask
     *
     * @param \AppCofidurBundle\Entity\OperatorTasks $operatortask
     *
     * @return OperatorCategory
     */
    public function addOperatortask(\AppCofidurBundle\Entity\OperatorTasks $operatortask)
    {
        $this->operatortasks[] = $operatortask;

        return $this;
    }

    /**
     * Remove operatortask
     *
     * @param \AppCofidurBundle\Entity\OperatorTasks $operatortask
     */
    public function removeOperatortask(\AppCofidurBundle\Entity\OperatorTasks $operatortask)
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
