<?php

namespace App\Form;

use App\Entity\TestEffort;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TestEffortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maquille', ChoiceType::class, array(
                'label' => 'Maquillé',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))
            ->add('type', ChoiceType::class, array(
                'label' => 'Type',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Vélo' => 'Vélo',
                    'Tapis' => 'Tapis',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))
            ->add('duree', IntegerType::class, array(
                'label' => 'Durée',
                'attr' => array(
                    'unity' => 'min.',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('watts', IntegerType::class, array(
                'label' => 'Watts',
                'attr' => array(
                    'unity' => 'w',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('frequenceMax', IntegerType::class, array(
                'label' => 'Fréq. max',
                'attr' => array(
                    'unity' => 'btms/min.',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('frequenceMaxPercent', IntegerType::class, array(
                'label' => '% de la Fréq. max',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('TASRepos', IntegerType::class, array(
                'label' => 'TAS repos',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('TASEffort', IntegerType::class, array(
                'label' => 'TAS effort',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('ECGModifie', ChoiceType::class, array(
                'label' => 'ECG modifié',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'décalage ST atypique' => 'décalage ST atypique',
                    'décalage ST typique' => 'décalage ST typique'
                ),
                'required' => false,
            ))
            ->add('mesure', IntegerType::class, array(
                'label' => 'Mesure',
                'attr' => array(
                    'unity' => 'mm',
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
            'data_class' => TestEffort::class,
        ]);
    }
}
