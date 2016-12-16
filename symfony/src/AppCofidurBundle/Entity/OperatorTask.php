<?php

namespace AppCofidurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatorTask
 *
 * @ORM\Table(name="operator_task")
 * @ORM\Entity(repositoryClass="AppCofidurBundle\Repository\OperatorTaskRepository")
 */
class OperatorTask
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
     * @ORM\OneToOne(targetEntity="Task")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    private $task;

    /**
     * @var Category $category
     *
     * @ORM\ManyToOne(targetEntity="OperatorCategory", inversedBy="operatortasks")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="operator_category_id", referencedColumnName="id")
     * })
     */
    private $operatorcategory;

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
     * Set validation
     *
     * @param boolean $validation
     *
     * @return OperatorTask
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
     * Set operatorcategory
     *
     * @param \AppCofidurBundle\Entity\OperatorCategory $operatorcategory
     *
     * @return OperatorTask
     */
    public function setOperatorcategory(\AppCofidurBundle\Entity\OperatorCategory $operatorcategory = null)
    {
        $this->operatorcategory = $operatorcategory;

        return $this;
    }

    /**
     * Get operatorcategory
     *
     * @return \AppCofidurBundle\Entity\OperatorCategory
     */
    public function getOperatorcategory()
    {
        return $this->operatorcategory;
    }

    /**
     * Set task
     *
     * @param task $task
     *
     * @return OperatorTask
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }
}
