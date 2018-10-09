<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="registration")
     */
    public function index(Request $request)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('email', EmailType::class)
            ->add('password',PasswordType::class,array('attr' => array('minlength' => 6)))
            ->add('firstname',TextType::class)
            ->add('lastname',TextType::class)
            ->add('save', SubmitType::class, array('label' => "S'inscrire"))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($user);
             $entityManager->flush();

            return $this->redirectToRoute('confirmation');
        }

        return $this->render('registration/registration.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
