<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TriangleController extends AbstractController
{
    /**
     * @Route("/triangle/{p1}/{p2}/{p3}", name="app_triangle")
     */
    public function index($p1,$p2,$p3): JsonResponse
    {
        $triangle = array();
        $triangle["type"]="Triangle";
        $triangle["p1"]=$p1;
        $triangle["p2"]=$p2;
        $triangle["p3"]=$p3;
        $surface= ($p1 + $p3 + $p3)/2;
        $triangle["surface"]= $surface;
        $triangle["circumference"] =  $p1+$p2+$p3;


        return $this->json([
            $triangle
        ]);
    }
}
