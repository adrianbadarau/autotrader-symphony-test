<?php
/**
 * Created by PhpStorm.
 * User: adiba
 * Date: 23-Jan-17
 * Time: 22:22
 */

namespace CarBundle\Service;


use CarBundle\Entity\Car;

class DataChecker
{
    protected $enablePromoting;

    /**
     * DataChecker constructor.
     * @param $enablePromoting
     */
    public function __construct($enablePromoting)
    {
        $this->enablePromoting = $enablePromoting;
    }

    public function checkCar(Car $car)
    {
        if($this->enablePromoting && $car->getNavigation()){
            return true;
        }
        return false;
    }
}