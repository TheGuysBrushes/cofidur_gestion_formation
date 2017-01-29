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

}
