<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ref_utilisateur', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Nom_utilisateur', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Mot_de_passe', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Adresse_utilisateur', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Email_utilisateur', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Telephone_utilisateur', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
