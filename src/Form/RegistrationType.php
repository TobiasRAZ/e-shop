<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Adresse email ..."))
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom(s)", "Prénom(s) ..."))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Nom de famille ..."))
            ->add('password', PasswordType::class, $this->getConfiguration("Mot de passe", " Mot de passe ..."))
            ->add('company', TextType::class, $this->getConfiguration("Entreprise", "Le nom de l'entreprise ..."))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}