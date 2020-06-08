<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="app_dashboard")
     * @IsGranted("ROLE_USER")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
    	//$this->denyAccessUnlessGranted('ROLE_USER');
       return $this->render('doc/dashboard.html.twig');
    }

     /**
     * @Route("/about", name="app_about")
     * 
     */
    public function about(): Response
    {
     
       return $this->render('doc/about.html.twig');
    }
}
