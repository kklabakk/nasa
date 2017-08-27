<?php

namespace NeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/neo")
     */
    public function indexAction()
    {
        return $this->render('NeoBundle:Default:index.html.twig');
    }
}
