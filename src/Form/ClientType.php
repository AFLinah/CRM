<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ref_client', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Nom_client', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Adresse_client', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Email_client', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Telephone_client', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Produits', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'Nom_produit',
                'multiple' => true, 
                'expanded' => true, 
                'by_reference' => false,
                'attr' => ['class' => 'mb-3 ms-3'] 
            ])
            ->add('Services', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'Nom_service',
                'multiple' => true, 
                'expanded' => true, 
                'by_reference' => false,
                'attr' => ['class' => 'mb-3 ms-3'] 
            ])
            // ->add('produitsAchetes', EntityType::class, [
            //     'class' => Produit::class,
            //     'required' => false,
            //     'choice_label' => 'Ref_produit'
            // ])
            // ->add('servicesLoues', EntityType::class, [
            //     'class' => Service::class,
            //     'required' => false,
            //     'choice_label' => 'Ref_service'
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
