<?php

namespace App\Form;

use App\Entity\Echographie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EchographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reposIVA', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('reposCX', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('reposCD', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))

            ->add('effortIVA', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('effortCX', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('effortCD', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))

            ->add('nbSegmentIVA', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('nbSegmentCX', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('nbSegmentCD', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('fractionEjection', IntegerType::class, array(
                'label' => 'Fraction d\'éjection (en %)',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Echographie::class,
        ]);
    }
}
