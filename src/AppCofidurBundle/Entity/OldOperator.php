// src/AppCofidurBundle/Entity/Operator.php
namespace AppCofidurBundle\Entity;

class Operator
{
    private $lastname;
    private $firstname;

    public function get_lastname()
    {
        return $this->lastname;
    }

    public function set_lastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function get_firstname()
    {
        return $this->firstname;
    }

    public function set_firstname($firstname)
    {
        $this->$firstname = $firstname;
    }
}

