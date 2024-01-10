<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MailEducateurRepository;
use App\Repository\EducateurRepository;
use App\Entity\Educateur;
use App\Entity\MailEducateur;
use DateTime;

class EmailEduController extends AbstractController
{ 
    private MailEducateurRepository $mailEducateurRepository;

    private EducateurRepository $educateurRepository;

    public function  __construct(MailEducateurRepository $mailEducateurRepository,EducateurRepository $educateurRepository){
        $this->mailEducateurRepository=$mailEducateurRepository;
       
        $this->educateurRepository=$educateurRepository;

    }
    #[Route('/email/edu', name: 'app_email_edu')]
    public function index(): Response
    {
        //  $userId = $this->getUser()->getId();
        $emails = $this->mailEducateurRepository->getEduById(4);
        return $this->render('email_edu/index.html.twig', [
            'emails' => $emails,
        ]);
    }
    #[Route('/email/edu/delete/', name: 'MailEdudelete')]
    //SUPPRESION D'EMAIL
    public function delete(Request $request): Response
    {
        $id=$request->query->get('id');
       $this->mailEducateurRepository->deleteById($id);
        return $this->redirectToRoute('MailEdudelete');
    }


     //ENVOYER DES MAIL 

    #[Route(path: '/email/edu/send', name: 'sendEmailToEdu')]
    public function sendMailEdu(Request $request): Response {
        $educateurs = $this->educateurRepository->findAll();
        $form = $this->createFormBuilder()->add('objet', TextType::class, [
            'label' => 'Objet: ',
            'required' => true,
            'attr' => [
                'placeholder' => 'Objet...',
            ]])->add('message', TextareaType::class, [
            'required' => true,
            'label' => 'Message: ',
            'attr' => [
                'placeholder' => 'Ecrivez votre message ici..',
            ]])->add('destinataire', ChoiceType::class, [
            'label' => 'Destinataire: ',
            'choices' => $educateurs,
            'choice_label' => 'email',
            'choice_value' => 'id',
            'multiple' => true,
            'expanded' => false,
        ])->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $email  = new MailEducateur();
            $email->setObjet($data['objet']);
            $email->setMessage($data['message']);
            $now = new DateTime();
            $email->setDateEnvoi($now);

           $userId = $this->getUser()->getId();
            $expediteur = $this->educateurRepository->findOneBy(['id'=> $userId]);
            $email->setExpediteur($expediteur);

            foreach ($data['destinataire'] as $educateur) {
                $educateurs = $this->educateurRepository->findAll($educateur->getId());
                foreach ($educateurs as $value) {
                    $email->addEducateur($value);
                }
            }


            $this->mailEducateurRepository->send($email);
            return $this->redirectToRoute('app_email_edu');
        }

        return $this->render('email_edu/sendEmailToEdu.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
