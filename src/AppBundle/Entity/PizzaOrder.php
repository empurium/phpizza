<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PizzaOrder
 *
 * @ORM\Table(name="pizza_orders")
 * @ORM\Entity
 */
class PizzaOrder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="pizza_variety", type="string", length=255)
     */
    private $pizzaVariety;

    /**
     * @var string
     *
     * @ORM\Column(name="toppings", type="text")
     */
    private $toppings;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


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
     * Set customerId
     *
     * @param integer $customerId
     *
     * @return PizzaOrder
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set pizzaVariety
     *
     * @param string $pizzaVariety
     *
     * @return PizzaOrder
     */
    public function setPizzaVariety($pizzaVariety)
    {
        $this->pizzaVariety = $pizzaVariety;

        return $this;
    }

    /**
     * Get pizzaVariety
     *
     * @return string
     */
    public function getPizzaVariety()
    {
        return $this->pizzaVariety;
    }

    /**
     * Set toppings
     *
     * @param string $toppings
     *
     * @return PizzaOrder
     */
    public function setToppings($toppings)
    {
        $this->toppings = $toppings;

        return $this;
    }

    /**
     * Get toppings
     *
     * @return string
     */
    public function getToppings()
    {
        return $this->toppings;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return PizzaOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

