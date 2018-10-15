<?php

namespace App\Controller;

use App\Entity\Chicken;
use App\Form\ChickenType;
use App\Repository\ChickenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chicken")
 */
class ChickenController extends AbstractController
{
    /**
     * @Route("/", name="chicken_index", methods="GET")
     */
    public function index(ChickenRepository $chickenRepository): Response
    {
        return $this->render('chicken/index.html.twig', ['chickens' => $chickenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="chicken_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $chicken = new Chicken();
        $form = $this->createForm(ChickenType::class, $chicken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chicken);
            $em->flush();

            return $this->redirectToRoute('chicken_index');
        }

        return $this->render('chicken/new.html.twig', [
            'chicken' => $chicken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chicken_show", methods="GET")
     */
    public function show(Chicken $chicken): Response
    {
        return $this->render('chicken/show.html.twig', ['chicken' => $chicken]);
    }

    /**
     * @Route("/{id}/edit", name="chicken_edit", methods="GET|POST")
     */
    public function edit(Request $request, Chicken $chicken): Response
    {
        $form = $this->createForm(ChickenType::class, $chicken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chicken_edit', ['id' => $chicken->getId()]);
        }

        return $this->render('chicken/edit.html.twig', [
            'chicken' => $chicken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chicken_delete", methods="DELETE")
     */
    public function delete(Request $request, Chicken $chicken): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chicken->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chicken);
            $em->flush();
        }

        return $this->redirectToRoute('chicken_index');
    }
}
