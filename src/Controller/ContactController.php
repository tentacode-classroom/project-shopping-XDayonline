<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Contact;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,\Swift_Mailer $mailer)
    {
        $contact = new Contact;
        $form = $this->createFormBuilder($contact)
            ->add('name', TextType::class, array('label'=> 'name', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('label'=> 'email','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('subject', TextType::class, array('label'=> 'subject','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('message', TextareaType::class, array('label'=> 'message','attr' => array('class' => 'form-control')))
            ->add('submit', SubmitType::class, array('label'=> 'submit', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $subject = $form['subject']->getData();
            $message = $form['message']->getData();

            $contact->setName($name);
            $contact->setName($email);
            $contact->setName($subject);
            $contact->setName($message);

            $sn = $this->getDoctrine()->getManager();
            $sn -> persist($contact);
            $sn -> flush();
        }

        if(isset($subject)) {
            $message = (new \Swift_Message($subject))
                ->setFrom('contactsymfony@gmail.com')
                ->setTo($email,$name)
                ->setContentType('text/html')
                ->setBody(
                    $this->renderView(
                        'contact/email.html.twig',
                        array('message' => $message)
                    )
                );
            $mailer->send($message);
        }

        return $this->render("contact/index.html.twig", array(
            'form' => $form->createView(),
        ));
    }
}