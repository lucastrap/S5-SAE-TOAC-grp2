<?php

namespace App\Form;

use App\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('format')
            ->add('prix')
            ->add('challenge')
            ->add('specificites')
            ->add('catAge')
            ->add('clotInscr')
            ->add('jour')
            ->add('horaires')
            ->add('horaires2')
            ->add('individuel')
            ->add('detailNonL')
            ->add('relais')
            ->add('detailNonLR')
            ->add('duo')
            ->add('detailNonLD')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}
