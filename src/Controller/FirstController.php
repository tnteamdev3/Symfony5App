<?php

namespace App\Controller;
use App\Entity\Doc;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\DocRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FirstController extends AbstractController
{
   

    /**
     * @Route("/first", name="first")
     */
    public function index(EntityManagerInterface $em): Response
    {

      /*  $doc = new Doc;

        $doc->setNom('nom3');
        $doc->setDescription('Description3');
       
        $em->persist($doc);
         $em->flush();*/
         $repo = $em->getRepository('App\Entity\Doc');

        $doc = $repo->findAll();
        return $this->render('doc/index.html.twig', ['doc'=> $doc]);
    }

   /**
     * @Route("/show/{id}", name="show")
     */
    public function show(DocRepository $repo, int $id): Response
    {
     
     $doc = $repo->find($id);
     
     if (! $doc){
        throw $this->createNotFoundException();
     }

    return $this->render('doc/show.html.twig', compact('doc'));
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {

     /*   if ($request->isMethod('POST')){
            $data = $request->request->all();

            $doc = new Doc;
            $doc->setNom($data['nom']);
            $doc->setDescription($data['description']);
            $em->persist($doc);
            $em->flush();

           // return $this->redirect->($this->generateUrl('first'));
            return $this->redirectToRoute('first');

        } */
        $doc = new Doc;

        $form = $this->createFormBuilder($doc)
             ->add('nom', TextType::class, ['attr' => ['autofocus' => true]])
             ->add('description', TextareaType::class, ['attr' => ['rows' => 10, 'cols' => 50]])
           //  ->add('submit', SubmitType::class, ['label' => 'Create Doc'])
             ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $em->persist($doc);
            $em->flush();

           // return $this->redirect->($this->generateUrl('first'));
            return $this->redirectToRoute('first');


        }



            return $this->render('doc/create.html.twig', ['monFormulaire' => $form->createView()]);
        
    }


}
