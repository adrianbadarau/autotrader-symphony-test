<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="car_index")
     */
    public function indexAction()
    {
        $cars = [
            [
                'make' => 'audy',
                'model' => 'tt',
                'year' => '2009',
                'price' => '5000'
            ],
            [
                'make' => 'dacia',
                'model' => 'logan',
                'year' => '2014',
                'price' => '4500'
            ],
            [
                'make' => 'skoda',
                'model' => 'octavia',
                'year' => '2009',
                'price' => '7000'
            ],

        ];
        return $this->render('CarBundle:Default:index.html.twig',compact('cars'));
    }
}
