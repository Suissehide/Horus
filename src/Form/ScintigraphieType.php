<?php

namespace App\Form;

use App\Entity\Scintigraphie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ScintigraphieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reposDebitIVA', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reposDebitCX', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reposDebitCD', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reposDebitTotal', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))

            ->add('regadenosonDebitIVA', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('regadenosonDebitCX', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('regadenosonDebitCD', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('regadenosonDebitTotal', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))

            ->add('reserveIVA', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reserveCX', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reserveCD', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('reserveTotal', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))

            ->add('reposAnalyseVisuelleIVA', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))
            ->add('reposAnalyseVisuelleCX', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))
            ->add('reposAnalyseVisuelleCD', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))

            ->add('regadenosonAnalyseVisuelleIVA', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))
            ->add('regadenosonAnalyseVisuelleCX', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))
            ->add('regadenosonAnalyseVisuelleCD', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Nécrosé' => 'Nécrosé',
                    'Ischémique' => 'Ischémique',
                ),
                'required' => false,
            ))

            ->add('fractionEjection', IntegerType::class, array(
                'label' => 'Fraction d\'éjection sous régadénoson (en %)',
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

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scintigraphie::class,
        ]);
    }
}
