<?php

namespace App\Form;

use App\Entity\CoronaireAngioplastie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CoronaireAngioplastieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stenoseIVA', ChoiceType::class, array(
                'label' => ' ',
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
                'label' => ' ',
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
                'label' => ' ',
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
            ->add('stenosePosterolateral', ChoiceType::class, array(
                'label' => ' ',
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
                'label' => ' ',
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
                'label' => ' ',
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
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrDiagonale', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrCirconflexe', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrPosterolateral', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrCoronaireDroite', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ffrPontage', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('cmrIVA', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrDiagonale', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrCirconflexe', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrPosterolateral', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrCoronaireDroite', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('cmrPontage', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('imrIVA', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrDiagonale', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrCirconflexe', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrPosterolateral', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrCoronaireDroite', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('imrPontage', NumberType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('angioplastieIVA', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieDiagonale', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieCirconflexe', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastiePosterolateral', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastieCoronaireDroite', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))
            ->add('angioplastiePontage', ChoiceType::class, array(
                'label' => ' ',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'required' => false,
            ))


            ->add('coroscannerIVA', ChoiceType::class, array(
                'label' => ' ',
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
                'label' => ' ',
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
                'label' => ' ',
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
            ->add('coroscannerPosterolateral', ChoiceType::class, array(
                'label' => ' ',
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
                'label' => ' ',
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
                'label' => ' ',
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

            ->add('scoreCalciqueCoronaire', ChoiceType::class, array(
                'label' => ' ',
                'choices' => array(
                    '< 10' => '< 10',
                    '11 - 99' => '11 - 99',
                    '100 - 399' => '100 - 399',
                    '> 400' => '> 400',
                    '> 1000' => '> 1000',
                    'Pas de données' => 'Pas de données'
                ),
                'required' => false
            ))

            ->add('nonAnalysable', ChoiceType::class, array(
                'label' => 'Non analysable devant CAC élevé',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('absenceAtherome', ChoiceType::class, array(
                'label' => 'Absence d\'athérome',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('remodelagePlaque', ChoiceType::class, array(
                'label' => 'Remodelage de la plaque*',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('napkinRing', ChoiceType::class, array(
                'label' => 'Napkin ring*',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))

            ->add('molle', ChoiceType::class, array(
                'label' => 'Molle (hyperdense)',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('calcaire', ChoiceType::class, array(
                'label' => 'Calcaire (hyperdense)',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('mixte', ChoiceType::class, array(
                'label' => 'Mixte',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))

            ->add('volumeNonRealisable', ChoiceType::class, array(
                'label' => 'Volume non réalisable (charge trop importante en athérome, CAC élevé...)',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé'
                ),
                'required' => false
            ))
            ->add('volumePlaqueHypodense', NumberType::class, array(
                'label' => 'Valume plaque hypodense (< 30 UH) BLEU',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.01',
                ),
                'required' => false
            ))
            ->add('volumePlaqueCalcifiee', NumberType::class, array(
                'label' => 'Valume de plaque calcifiée JAUNE',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.01',
                ),
                'required' => false
            ))
            ->add('volumePlaque', NumberType::class, array(
                'label' => 'Volume plaque non calcifiée non hypodense ROSE',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.01',
                ),
                'required' => false
            ))
            ->add('volumeTotalPlaque', NumberType::class, array(
                'label' => 'Volume total de plaque (BLEU + JAUNE + ROSE)',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.01',
                ),
                'required' => false
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CoronaireAngioplastie::class,
        ]);
    }
}
