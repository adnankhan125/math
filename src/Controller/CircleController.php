<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CircleController extends AbstractController
{
    /**
     * @Route("/circle/{radius}", name="app_circle")
     */
    public function index($radius): JsonResponse
    {
        $circle = array();
        $circle["type"]="Circle";
        $circle["radius"]=$radius;
        $circle["surface"]=$this->calculateAreaOfCircle($radius);
        $circle["circumference"]=$this->calculateAreaOfCircle($radius,'diameter');
        return $this->json([
            $circle
        ]);
    }

    public function calculateAreaOfCircle($number = 1, $type = 'radius') {
        if(!is_numeric($number) || $number <= 0)
          return -1;

        switch($type) {
          case 'radius':
          default:
            $radius = $number;
            break;
          case 'diameter':
            $radius = $number / 2;
            break;
        }
        return pow($radius, 2) * M_PI;
      }
}
