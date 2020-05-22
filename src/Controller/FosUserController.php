<?php

namespace App\Controller;

use App\Entity\FosUser;
use App\Form\FosUserType;
use App\Repository\FosUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fos/user")
 */
class FosUserController extends AbstractController
{
    /**
     * @Route("/", name="fos_user_index", methods={"GET"})
     */
    public function index(FosUserRepository $fosUserRepository): Response
    {
        return $this->render('fos_user/index.html.twig', [
            'fos_users' => $fosUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fos_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fosUser = new FosUser();
        $form = $this->createForm(FosUserType::class, $fosUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fosUser);
            $entityManager->flush();

            return $this->redirectToRoute('fos_user_index');
        }

        return $this->render('fos_user/new.html.twig', [
            'fos_user' => $fosUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fos_user_show", methods={"GET"})
     */
    public function show(FosUser $fosUser): Response
    {
        return $this->render('fos_user/show.html.twig', [
            'fos_user' => $fosUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fos_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FosUser $fosUser): Response
    {
        $form = $this->createForm(FosUserType::class, $fosUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fos_user_index');
        }

        return $this->render('fos_user/edit.html.twig', [
            'fos_user' => $fosUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fos_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FosUser $fosUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fosUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fosUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fos_user_index');
    }
}
