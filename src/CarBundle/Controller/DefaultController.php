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
        return $this->render('CarBundle:Default:index.html.twig');
    }
}
