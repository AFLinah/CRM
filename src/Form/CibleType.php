<?php

namespace App\Form;

use App\Entity\Cannaux;
use App\Entity\Cible;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CibleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder 
            ->add('Ref_cible', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Nom_cible', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Localisation', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            // ->add('Interet', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('Activite', TextType::class, ['attr' => ['class' => 'mb-3 ms-3']])
            ->add('canal', EntityType::class, [
                'class' => Cannaux::class,
                'choice_label' => 'Nom_canal',
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
            'data_class' => Cible::class,
        ]);
    }
}
