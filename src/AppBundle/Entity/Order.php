<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Order
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
     * @ORM\Column(name="toppings", type="simple_array")
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
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * @return Order
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

