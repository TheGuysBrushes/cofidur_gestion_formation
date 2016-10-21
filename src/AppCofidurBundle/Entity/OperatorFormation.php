<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatorFormation
 *
 * @ORM\Table(name="operator_formation")
 * @ORM\Entity(repositoryClass="AppCofidurBundle\Repository\OperatorFormationRepository")
 */
class OperatorFormation
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
     * @ORM\Column(name="idOperator", type="integer")
     */
    private $idOperator;

    /**
     * @var int
     *
     * @ORM\Column(name="idFormation", type="integer")
     */
    private $idFormation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateBegin", type="date")
     */
    private $dateBegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date")
     */
    private $dateEnd;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="string", length=255)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentary", type="string", length=255)
     */
    private $commentary;

    /**
     * @var int
     *
     * @ORM\Column(name="idFormer", type="integer")
     */
    private $idFormer;

    /**
     * @var ArrayCollection $operatorcategories
     *
     * @ORM\OneToMany(targetEntity="OperatorCategory", mappedBy="operatorformation", cascade={"remove"})
     */
    private $operatorcategories;

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
     * Set dateBegin
     *
     * @param \DateTime $dateBegin
     *
     * @return OperatorFormation
     */
    public function setDateBegin($dateBegin)
    {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    /**
     * Get dateBegin
     *
     * @return \DateTime
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return OperatorFormation
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set validation
     *
     * @param boolean $validation
     *
     * @return OperatorFormation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return bool
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set commentary
     *
     * @param string $commentary
     *
     * @return OperatorFormation
     */
    public function setCommentary($commentary)
    {
        $this->commentary = $commentary;

        return $this;
    }

    /**
     * Get commentary
     *
     * @return string
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * Set idFormer
     *
     * @param integer $idFormer
     *
     * @return OperatorFormation
     */
    public function setIdFormer($idFormer)
    {
        $this->idFormer = $idFormer;

        return $this;
    }

    /**
     * Get idFormer
     *
     * @return int
     */
    public function getIdFormer()
    {
        return $this->idFormer;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operatorcategories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set idOperator
     *
     * @param integer $idOperator
     *
     * @return OperatorFormation
     */
    public function setIdOperator($idOperator)
    {
        $this->idOperator = $idOperator;

        return $this;
    }

    /**
     * Get idOperator
     *
     * @return integer
     */
    public function getIdOperator()
    {
        return $this->idOperator;
    }

    /**
     * Set idFormation
     *
     * @param integer $idFormation
     *
     * @return OperatorFormation
     */
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    /**
     * Get idFormation
     *
     * @return integer
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Add operatorcategory
     *
     * @param \AppCofidurBundle\Entity\OperatorCategory $operatorcategory
     *
     * @return OperatorFormation
     */
    public function addOperatorcategory(\AppCofidurBundle\Entity\OperatorCategory $operatorcategory)
    {
        $this->operatorcategories[] = $operatorcategory;

        return $this;
    }

    /**
     * Remove operatorcategory
     *
     * @param \AppCofidurBundle\Entity\OperatorCategory $operatorcategory
     */
    public function removeOperatorcategory(\AppCofidurBundle\Entity\OperatorCategory $operatorcategory)
    {
        $this->operatorcategories->removeElement($operatorcategory);
    }

    /**
     * Get operatorcategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperatorcategories()
    {
        return $this->operatorcategories;
    }
}
