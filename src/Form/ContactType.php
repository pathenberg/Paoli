<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'attr' =>array(
                'placeholder' =>'Entrez votre prénom'
            )
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' =>array(
                'placeholder' =>'Entrez votre nom')
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' =>array(
                'placeholder' =>'Entrez votre email')
        ])
        ->add('message', TextType::class, [
            'label' => 'Message',
            'attr' =>array(
                'placeholder' =>'Entrez votre message')
        ])
        ->add('reason', ChoiceType::class, [
            'label' => 'Choix contact',
            'choices' => [
                 'Je souhaite vous contacter par choix 1'=> 'Choix 3',
                
                 'Je souhaite vous contacter par choix 2'=> 'Choix 3',
                 'Je souhaite vous contacter par choix 3'=> 'Choix 3'
            ]
        ])
        ->add('telephone',  TextType::class, [
            'label' => 'Numéro de téléphone',
            'attr' =>array(
                'placeholder' =>'Entrez votre numéro de téléphone')
        ])
        ->add('Soumettre', SubmitType::class, [
            'attr' => ['class' => 'save btn-primary'],
        ]);
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
