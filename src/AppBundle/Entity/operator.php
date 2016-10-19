// src/AppBundle/Entity/Operator.php
namespace AppBundle\Entity;

class Operator
{
protected $lastname;
protected $firstname;

public function get_lastname()
{
return $this->task;
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