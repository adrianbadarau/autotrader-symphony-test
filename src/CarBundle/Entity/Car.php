<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car
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
     * @var Make
     *
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Make", inversedBy="cars")
     */
    private $make;

    /**
     * @var Model
     *
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="cars")
     */
    private $model;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=true)
     */
    private $year;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", scale=2, nullable=true)
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     **/
    private $description;

    /**
     * @var  $navigation
     *
     * @ORM\Column(name="navigation", type="boolean", options={"default":false})
     **/
    private $navigation;

    /**
     * @var $promote
     * @ORM\Column("promote", type="boolean", nullable=true)
    **/
    private $promote;


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
     * Set model
     *
     * @param Model $model
     *
     * @return Car
     */
    public function setModel(Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     *
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $description
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set navigation
     *
     * @param boolean $navigation
     *
     * @return Car
     */
    public function setNavigation($navigation)
    {
        $this->navigation = $navigation;

        return $this;
    }

    /**
     * Get navigation
     *
     * @return boolean
     */
    public function getNavigation()
    {
        return $this->navigation;
    }

    /**
     * Set make
     *
     * @param Make $make
     *
     * @return Car
     */
    public function setMake(Make $make = null)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return Make
     */
    public function getMake()
    {
        return $this->make;
    }

    function __toString()
    {
        return $this->getMake()->getName() . " " . $this->getModel()->getName();
    }



    /**
     * Set promote
     *
     * @param boolean $promote
     *
     * @return Car
     */
    public function setPromote($promote)
    {
        $this->promote = $promote;

        return $this;
    }

    /**
     * Get promote
     *
     * @return boolean
     */
    public function getPromote()
    {
        return $this->promote;
    }
}
