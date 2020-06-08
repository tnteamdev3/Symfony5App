<?php

namespace App\Controller;

use App\Entity\UserEntreprise;
use App\Form\UserEntrepriseType;
use App\Repository\UserEntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/entreprise")
 */
class UserEntrepriseController extends AbstractController
{
    /**
     * @Route("/", name="user_entreprise_index", methods={"GET"})
     */
    public function index(UserEntrepriseRepository $userEntrepriseRepository): Response
    {
        return $this->render('user_entreprise/index.html.twig', [
            'user_entreprises' => $userEntrepriseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_entreprise_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userEntreprise = new UserEntreprise();
        $form = $this->createForm(UserEntrepriseType::class, $userEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userEntreprise);
            $entityManager->flush();

            return $this->redirectToRoute('user_entreprise_index');
        }

        return $this->render('user_entreprise/new.html.twig', [
            'user_entreprise' => $userEntreprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_entreprise_show", methods={"GET"})
     */
    public function show(UserEntreprise $userEntreprise): Response
    {
        return $this->render('user_entreprise/show.html.twig', [
            'user_entreprise' => $userEntreprise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_entreprise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserEntreprise $userEntreprise): Response
    {
        $form = $this->createForm(UserEntrepriseType::class, $userEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_entreprise_index');
        }

        return $this->render('user_entreprise/edit.html.twig', [
            'user_entreprise' => $userEntreprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_entreprise_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserEntreprise $userEntreprise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userEntreprise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userEntreprise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_entreprise_index');
    }
}
