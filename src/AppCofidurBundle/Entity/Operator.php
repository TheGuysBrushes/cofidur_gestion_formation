<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operator
 *
 * @ORM\Table(name="operator")
 * @ORM\Entity(repositoryClass="AppCofidurBundle\Repository\OperatorRepository")
 */
class Operator extends User
{
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     */
    private $dateOfBirth;



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
