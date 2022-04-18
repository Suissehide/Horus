<?php

namespace App\Form;

use App\Entity\Echographie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EchographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reposIVA')
            ->add('reposCX')
            ->add('reposCD')
            ->add('effortIVA')
            ->add('effortCX')
            ->add('effortCD')
            ->add('nbSegmentIVA')
            ->add('nbSegmentCX')
            ->add('nbSegmentCD')
            ->add('fractionEjection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Echographie::class,
        ]);
    }
}
