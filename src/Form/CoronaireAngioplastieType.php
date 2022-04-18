<?php

namespace App\Form;

use App\Entity\CoronaireAngioplastie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class CoronaireAngioplastieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stenoseIVA', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('stenoseDiagonale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('stenoseCirconflexe', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('stenosePostrolLaterale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('stenoseCoronaireDroite', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('stenosePontage', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))


            ->add('ffrIVA', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrDiagonale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrCirconflexe', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrPostrolLaterale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrCoronaireDroite', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrPontage', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('cmrIVA', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrDiagonale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrCirconflexe', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrPostrolLaterale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrCoronaireDroite', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrPontage', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('imrIVA', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrDiagonale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrCirconflexe', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrPostrolLaterale', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrCoronaireDroite', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrPontage', NumberType::class, array(
                'label' => '',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('angioplastieIVA', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieDiagonale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieCirconflexe', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastiePostrolLaterale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieCoronaireDroite', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastiePontage', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))


            ->add('coroscannerIVA', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('coroscannerDiagonale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('coroscannerCirconflexe', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('coroscannerPostrolLaterale', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('coroscannerCoronaireDroite', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('coroscannerPontage', ChoiceType::class, array(
                'label' => '',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))


            ->add('scoreCalcique', IntegerType::class, array(
                'label' => 'Score calcique',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CoronaireAngioplastie::class,
        ]);
    }
}
