<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\cs_CZ\DateTime;

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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="operator_id", referencedColumnName="id")
     */
    private $operator;

    /**
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     */
    private $formation;

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
     * @var int
     *
     * @ORM\Column(name="validation", type="integer")
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentary", type="string", length=255, nullable=true)
     */
    private $commentary;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="former_id", referencedColumnName="id")
     */
    private $former;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255, nullable=true)
     */
    private $signature;

    /**
     * @var ArrayCollection $operatorcategories
     *
     * @ORM\OneToMany(targetEntity="OperatorCategory", mappedBy="operatorformation", cascade={"remove"})
     */
    private $operatorcategories;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operatorcategories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateBegin= new \DateTime();
        $this->dateEnd= new \DateTime('+1 day');
    }

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
     * @param int $validation
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
     * @return int
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
     * Set former
     *
     * @param Operator $former
     *
     * @return OperatorFormation
     */
    public function setFormer($former)
    {
        $this->former = $former;

        return $this;
    }

    /**
     * Get former
     *
     * @return Operator
     */
    public function getFormer()
    {
        return $this->former;
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
     * Set operator
     *
     * @param Operator $operator
     *
     * @return OperatorFormation
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return Operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set formation
     *
     * @param Formation $formation
     *
     * @return OperatorFormation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return formation
     */
    public function getFormation()
    {
        return $this->formation;
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

    /**
     * Get the number of days elapsed from the end of the formation till the current date
     * @return string
     */
    public function getFormationElapsedTime()
    {
        $end= $this->dateEnd;
        $current= new \DateTime();

        //if the formation isn't finished yet, we consider that the elapsed time is 0
        if((null == $end) | ($current < $end)) {
            return 0;
        }
        else {
            $interval= $end->diff($current);
            $formatted_elapsed_time= $interval->format('%a');
            return $formatted_elapsed_time;
        }
    }
}