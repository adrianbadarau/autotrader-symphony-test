<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="car.index")
     */
    public function indexAction()
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->getCarsWithAllDetails();
        return $this->render('CarBundle:Default:index.html.twig',compact('cars'));
    }

    /**
     * @Route("/{carId}", name="car.show")
     * @param int $carId
     * @return Response
     */
    public function showAction(int $carId) : Response
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $car = $carRepository->getCarWithDetails($carId);

        return $this->render('CarBundle:Default:show.html.twig',compact('car'));
    }
}
