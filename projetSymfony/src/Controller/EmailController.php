<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use DateTime;
use App\Entity\MailContact;

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;
use App\Repository\CategorieRepository;
use App\Repository\MailContactRepository;
use App\Repository\EducateurRepository;
use Educateur;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmailController extends AbstractController
{
    private MailContactRepository $mailContactRepository;
    private ContactRepository $contactRepository;
    private CategorieRepository $categorieRepository;
    private EducateurRepository $educateurRepository;

    public function  __construct(MailContactRepository $mailContactRepository,ContactRepository $contactRepository ,CategorieRepository $categorieRepository,EducateurRepository $educateurRepository){
        $this->mailContactRepository=$mailContactRepository;
        $this->contactRepository=$contactRepository;
        $this->categorieRepository=$categorieRepository;
        $this->educateurRepository=$educateurRepository;

    }
    #[Route('/mail/contact', name: 'appMailContact')]
    public function index(): Response
    {
        //  $userId = $this->getUser()->getId();
        $emails = $this->mailContactRepository->getByContactId(3);
        return $this->render('email/index.html.twig', [
            'emails' => $emails,
        ]);
    }

    #[Route('/mail/contact/delete/', name: 'appMailContactdelete')]
    
    //SUPPRESION D'EMAIL
    public function delete(Request $request): Response
    {
        $id=$request->query->get('id');
       $this->mailContactRepository->deleteById($id);
        return $this->redirectToRoute('appMailContact');
    }

    //ENVOYER DES MAIL 
    #[Route(path: '/mail/contact/send', name: 'appSendEmailToContact')]
    public function sendMailContact(Request $request): Response {
        $categories = $this->categorieRepository->findAll();
        $form = $this->createFormBuilder()->add('objet', TextType::class, [
            'label' => 'Objet: ',
            'required' => true,
            'attr' => [
                'placeholder' => 'Objet...',
            ]])->add('message', TextareaType::class, [
            'required' => true,
            'label' => 'Message: ',
            'attr' => [
                'placeholder' => 'Entrer votre message ici..',
            ]])->add('destinataire', ChoiceType::class, [
            'label' => 'Destinataire: ',
            'choices' => $categories,
            'choice_label' => 'nom',
            'choice_value' => 'id',
            'multiple' => true,
            'expanded' => false,
        ])->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $email  = new MailContact();
            $email->setObjet($data['objet']);
            $email->setMessage($data['message']);
            $now = new DateTime();
            $email->setDateEnvoie($now);

           // $userId = $this->getUser()->getId();
            $expediteur = $this->educateurRepository->findOneBy(['id'=> 3]);
            $email->setExpediteur($expediteur);

            foreach ($data['destinataire'] as $educateur) {
                if ($educateur instanceof Educateur) {
                    // Obtenez l'e-mail de l'éducateur (ajustez selon votre structure de classe Educateur)
                    $educateurEmail = $educateur->getEmail();
            
                    // Ajoutez l'éducateur en tant que destinataire de l'e-mail
                    $email->addDestinataire($educateurEmail);
                }
            
            }


            $this->mailContactRepository->send($email);
            return $this->redirectToRoute('appMailContact');
        }

        return $this->render('email/sendEmailToContact.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
