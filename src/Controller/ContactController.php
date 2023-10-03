<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\MailService;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, MailService $mailService): Response
    
    {
        $contact = new Contacts();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            

            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();

            $mailService->sendMail(            
                ['prenom' => $contact->getPrenom(),
               'nom' => $contact->getNom(),
               'message' => $contact->getMessage()
               ],$contact->getEmail(),"Message de contact", 'email/signup.html.twig'
            );
            $contact = new Contacts();
            $form = $this->createForm(ContactType::class, $contact);
            
            $this->addFlash('confirmation', 'Votre email a bien été envoyé !');

            // return $this->redirectToRoute('task_success');
      

            
        }

        return $this->render('contact/index.html.twig', [
            'contact_form'=>$form
        ]);
    }
}
