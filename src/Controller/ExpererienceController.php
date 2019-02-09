<?php

namespace App\Controller;

use App\Entity\Expererience;
use App\Form\ExpererienceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/expererience")
 */
class ExpererienceController extends AbstractController
{
    /**
     * @Route("/", name="expererience_index", methods={"GET"})
     */
    public function index(): Response
    {
        $expereriences = $this->getDoctrine()
            ->getRepository(Expererience::class)
            ->findAll();

        return $this->render('expererience/index.html.twig', [
            'expereriences' => $expereriences,
        ]);
    }

    /**
     * @Route("/new", name="expererience_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $expererience = new Expererience();
        $form = $this->createForm(ExpererienceType::class, $expererience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($expererience);
            $entityManager->flush();

            return $this->redirectToRoute('expererience_index');
        }

        return $this->render('expererience/new.html.twig', [
            'expererience' => $expererience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="expererience_show", methods={"GET"})
     */
    public function show(Expererience $expererience): Response
    {
        return $this->render('expererience/show.html.twig', [
            'expererience' => $expererience,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="expererience_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Expererience $expererience): Response
    {
        $form = $this->createForm(ExpererienceType::class, $expererience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('expererience_index', [
                'id' => $expererience->getId(),
            ]);
        }

        return $this->render('expererience/edit.html.twig', [
            'expererience' => $expererience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="expererience_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Expererience $expererience): Response
    {
        if ($this->isCsrfTokenValid('delete'.$expererience->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($expererience);
            $entityManager->flush();
        }

        return $this->redirectToRoute('expererience_index');
    }
}
