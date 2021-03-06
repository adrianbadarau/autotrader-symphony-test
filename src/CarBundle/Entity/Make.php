<?php

namespace CarBundle\Entity;

use CarBundle\Entity\Car;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Make
 *
 * @ORM\Table(name="make")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\MakeRepository")
 */
class Make
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
     * @var $name string
     *
     * @ORM\Column(name="name", type="string", length=255)
    **/
    private $name;

    /**
     * @var $cars ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Car", mappedBy="make")
    **/
    private $cars;


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
     * Set name
     *
     * @param string $name
     *
     * @return Make
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    /**
     * Add car
     *
     * @param Car $car
     *
     * @return Make
     */
    public function addCar(Car $car)
    {
        $this->cars[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param Car $car
     */
    public function removeCar(Car $car)
    {
        $this->cars->removeElement($car);
    }

    /**
     * Get cars
     *
     * @return Collection
     */
    public function getCars()
    {
        return $this->cars;
    }

    function __toString()
    {
        return $this->getName();
    }


}
