<?php

namespace App\Form;

use App\Entity\Cible;
use App\Entity\Client;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ref_service', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Nom_service', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Description', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Tarif_horaire', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Statut', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Zone_geographique', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            // ->add('Client', EntityType::class, [
            //     'class' => Client::class,
            //     'choice_label' => 'Ref_client',
            //     'required' => false,
            //     'attr' => ['class' => 'mb-3 ms-3'] 
            // ])
            ->add('cible', EntityType::class, [
                'class' => Cible::class,
                'choice_label' => 'Nom_cible',
                'multiple' => true, 
                'expanded' => true, 
                'by_reference' => false,
                'attr' => ['class' => 'mb-3 ms-3'] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
