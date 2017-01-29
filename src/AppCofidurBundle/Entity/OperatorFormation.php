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
     * @ORM\Column(name="dateEnd", type="date", nullable=true)
     */
    private $dateEnd;

    /**
     * @var int
     * 1 => unvalidated
     * 2 => validating
     * 3 => planned
     * 4 => formed
     * 5 => can form
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
     * 1 => unvalidated
     * 2 => validating
     * 3 => planned
     * 4 => formed
     * 5 => can form
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
     * 1 => unvalidated
     * 2 => validating
     * 3 => planned
     * 4 => formed
     * 5 => can form
     *
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
     * Verify that the formation is renewable
     * @return bool
     */
    public function isRenewable()
    {
        return $this->getFormation()->getValidityTime() > 0;
    }

    /**
     * Get the number of days elapsed from the end of the formation till the current date
     * @return string
     */
    public function getElapsedTime()
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

    /**
     * Get the number of days elapsed from the end of the formation till the current date
     * @return string
     */
    public function getRemainingTime()
    {
        $current= new \DateTime();
        //if the formation isn't finished yet, the validity time is 0 (for infinity / invalidated yet formation)
        if( $this->validation < 4 || null == $this->dateEnd) {
            return 0;
        }
        else {
            $elapsed= $this->getElapsedTime($current);
            $validityTime= $this->getFormation()->getValidityTime();

            $remaining= $validityTime - $elapsed;
            /* TODO Use a DateTime type for formatting ? */
//            $formatted_remaining= $remaining->format('%a');
            return $remaining;
        }
    }

    /**
     * Verify if the formation is invalidated :
     *  the number of days elapsed since the end of the formation is greater than validity time
     * @return bool
     */
    public function isInvalidated()
    {
        $validityTime= $this->getFormation()->getValidityTime();
        return $validityTime > 0 && $this->getElapsedTime() > $validityTime;
    }

    /**
     * Verify that the operator has finished the formation. He may have been habilitated or be waiting for validation
     * @return bool
     */
    public function isFinished()
    {
        return $this->validation == 1 or $this->validation >= 4;
    }
}
