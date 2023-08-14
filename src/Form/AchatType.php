<?php

namespace App\Form;

use App\Entity\Achat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AchatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ref_achat', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Date_achat')
            ->add('Statut_payement', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Statut_livraison', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'Ref_client'
            ])
            ->add('Produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'Ref_produit'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Achat::class,
        ]);
    }
}
