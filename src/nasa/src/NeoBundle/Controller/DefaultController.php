<?php

namespace NeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * Potentially hazardous asteroids
     *
     * Display all DB entries which contain potentially hazardous asteroids
     *
     * @Route("/neo/hazardous")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hazardousAction()
    {
        $neoRepository = $this->get('neo.repository');
        $hazardous = $neoRepository->findAllHazardous();

        return $this->json($hazardous);
    }
}
