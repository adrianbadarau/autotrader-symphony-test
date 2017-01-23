<?php
/**
 * Created by PhpStorm.
 * User: adiba
 * Date: 23-Jan-17
 * Time: 22:22
 */

namespace CarBundle\Service;


use CarBundle\Entity\Car;
use Doctrine\ORM\EntityManager;

class DataChecker
{
    protected $enablePromoting;
    protected $entityManager;

    /**
     * DataChecker constructor.
     * @param $enablePromoting
     * @param EntityManager $entityManager
     */
    public function __construct($enablePromoting, EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->enablePromoting = $enablePromoting;
    }

    /**
     * @param Car $car
     * @return bool
     */
    public function checkCar(Car $car) : bool
    {
        $canPromote = false;
        if ($this->enablePromoting && $car->getNavigation()) {
            $canPromote = true;
        }
        $car->setPromote($canPromote);
        $this->entityManager->persist($car);
        $this->entityManager->flush();
        return $canPromote;
    }
}