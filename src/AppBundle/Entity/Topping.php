<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topping
 *
 * @ORM\Table(name="toppings")
 * @ORM\Entity
 */
class Topping
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
     * @var string
     *
     * @ORM\Column(name="topping_key", type="string", length=255)
     */
    private $toppingKey;


    /**
     * @var string
     *
     * @ORM\Column(name="topping", type="string", length=255)
     */
    private $topping;


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
     * Set toppingKey
     *
     * @param string $toppingKey
     *
     * @return ToppingKey
     */
    public function setToppingKey($toppingKey)
    {
        $this->toppingKey = $toppingKey;

        return $this;
    }

    /**
     * Get toppingKey
     *
     * @return string
     */
    public function getToppingKey()
    {
        return $this->toppingKey;
    }

    /**
     * Set topping
     *
     * @param string $topping
     *
     * @return Topping
     */
    public function setTopping($topping)
    {
        $this->topping = $topping;

        return $this;
    }

    /**
     * Get topping
     *
     * @return string
     */
    public function getTopping()
    {
        return $this->topping;
    }
}

