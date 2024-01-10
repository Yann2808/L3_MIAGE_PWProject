<?php

namespace App\Form;

use App\Entity\Licencie;
use App\Entity\Educateur;
use App\Entity\MailEducateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class LoginFormType extends AbstractType
{
    // public function buildForm(FormBuilderInterface $builder, array $options): void
    // {
    //     $builder
    //         ->add('email')
    //         ->add('motDePasse')
    //         ->add('isAdmin')
    //         ->add('licencie_id', EntityType::class, [
    //             'class' => Licencie::class,
    //             'choice_label' => 'id',
    //         ])
    //         ->add('mailEducateurs', EntityType::class, [
    //             'class' => MailEducateur::class,
    //             'choice_label' => 'id',
    //             'multiple' => true,
    //         ])
    //     ;
    // }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class)
            ->add('motDePasse', PasswordType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Educateur::class,
        ]);
    }
}
