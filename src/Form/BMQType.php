<?php

namespace App\Form;

use App\Entity\BMQ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BMQType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('response', ChoiceType::class, array(
                'label' => 'Réponse',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Pas du tout d\'accord' => 'Pas du tout d\'accord',
                    'Plutôt pas d\'accord' => 'Plutôt pas d\'accord',
                    'Ni en désaccord ni d\'accord' => 'Ni en désaccord ni d\'accord',
                    'Plutôt d\'accord' => 'Plutôt d\'accord',
                    'Tout à fait d\'accord' => 'Tout à fait d\'accord',
                ),
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BMQ::class,
        ]);
    }
}
