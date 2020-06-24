<?php

namespace App\digitcorp\crm\module\dashboard\Controller;
use App\digitcorp\crm\module\user\Entity\User;
use App\digitcorp\crm\module\entreprise\Entity\Entreprise;
use App\digitcorp\crm\module\project\Entity\Project;

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
        $usersNumber = $this->getDoctrine()->getRepository(User::class)->usersNumber()['1'];
        $entreprisesNumber = $this->getDoctrine()->getRepository(Entreprise::class)->entreprisesNumber()['1'];
        $projectsNumber = $this->getDoctrine()->getRepository(Project::class)->projectsNumber()['1'];
       // $tasksNumber = $this->getDoctrine()->getRepository(Task::class)->tasksNumber()['1'];
        
        return $this->render('dashboard/Twig/dashboard.html.twig',[
            'usersNumber' => $usersNumber,
            'entreprisesNumber' => $entreprisesNumber,
            'projectsNumber' => $projectsNumber,
         //   'tasksNumber' => $tasksNumber, 
            ]);
        
    }
    
      /**
     * @Route("/about", name="app_about")
     
     * 
     */
    public function about(): Response
    {
       return $this->render('dashboard/Twig/about.html.twig');
    }
    
}
