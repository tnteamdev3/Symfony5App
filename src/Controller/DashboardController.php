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
     * 
     */
    public function index(): Response
    {
    	//$this->denyAccessUnlessGranted('ROLE_USER');
       return $this->render('doc/dashboard.html.twig');
    }
     /**
     * @Route("/sidebar", name="app_sidebar")
     * @IsGranted("ROLE_USER")
     * 
     */
    public function sidebar(): Response
    {
       return $this->render('user/sideBar.html.twig');
    }


    
}
