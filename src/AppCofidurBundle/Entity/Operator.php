<?php

namespace AppCofidurBundle\Entity;

#use AppCofidurBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Operator
 */
class Operator extends User
{

    /**
     * @var \DateTime
     */
    private $dateOfBirth;


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
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Operator
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    
        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}

