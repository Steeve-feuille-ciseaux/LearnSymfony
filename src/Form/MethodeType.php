<?php

namespace App\Form;

use App\Entity\Methode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MethodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('demonstration')
            ->add('documentation')
            ->add('source')
            ->add('bundle')
            ->add('packagist')
            ->add('projet')
            ->add('devReferant')
            ->add('feature')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Methode::class,
        ]);
    }
}
