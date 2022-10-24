<?php

namespace App\Form;

use App\Entity\EchographieVasculaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EchographieVasculaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carotideInterneDroite', ChoiceType::class, array(
                'label' => 'Carotide interne droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('carotideInterneGauche', ChoiceType::class, array(
                'label' => 'Carotide interne gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('EIMDroit', NumberType::class, array(
                'label' => 'EIM droit',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0',
                    'data-max' => '0',
                    'step' => '0.0001',
                ),
                'required' => false,
            ))
            ->add('EIMGauche', NumberType::class, array(
                'label' => 'EIM gauche',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0',
                    'data-max' => '0',
                    'step' => '0.0001',
                ),
                'required' => false,
            ))
            ->add('vertebraleDroite', ChoiceType::class, array(
                'label' => 'Vertébrale droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('vertebraleGauche', ChoiceType::class, array(
                'label' => 'Vertébrale gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('carotideCommuneDroite', ChoiceType::class, array(
                'label' => 'Carotide commune droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('carotideCommuneGauche', ChoiceType::class, array(
                'label' => 'Carotide commune gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('sousClaviereDroite', ChoiceType::class, array(
                'label' => 'Sous-clavière droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('sousClaviereGauche', ChoiceType::class, array(
                'label' => 'Sous-clavière gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('TSAAorte', IntegerType::class, array(
                'label' => 'Aorte',
                'attr' => array(
                    'unity' => 'mm',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('volumeCarotideDroite', NumberType::class, array(
                'label' => 'Volume carotide droite',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => '0',
                    'data-max' => '0',
                    'step' => '0.01',
                ),
                'required' => false,
            ))
            ->add('volumeCarotideGauche', NumberType::class, array(
                'label' => 'Volume carotide gauche',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => '0',
                    'data-max' => '0',
                    'step' => '0.01',
                ),
                'required' => false,
            ))
            ->add('chargeAtheromeTotale', NumberType::class, array(
                'label' => 'Charge en athérome totale',
                'attr' => array(
                    'unity' => 'mm3',
                    'data-min' => '0',
                    'data-max' => '0',
                    'step' => '0.01',
                ),
                'required' => false,
            ))


            ->add('membresInferieurAorte', IntegerType::class, array(
                'label' => 'Diamètre aorte',
                'attr' => array(
                    'unity' => 'mm',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('iliaqueDroite', ChoiceType::class, array(
                'label' => 'Iliaque droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('iliaqueGauche', ChoiceType::class, array(
                'label' => 'Iliaque gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('femoraleCommuneDroite', ChoiceType::class, array(
                'label' => 'Fémorale commune droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('femoraleCommuneGauche', ChoiceType::class, array(
                'label' => 'Fémorale commune gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('femoraleSuperficielleDroite', ChoiceType::class, array(
                'label' => 'Fémorale superficielle droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('femoraleSuperficielleGauche', ChoiceType::class, array(
                'label' => 'Fémorale superficielle gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('popliteDroite', ChoiceType::class, array(
                'label' => 'Poplite droite',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('popliteGauche', ChoiceType::class, array(
                'label' => 'Poplite gauche',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('axesJambiersDroits', ChoiceType::class, array(
                'label' => 'Axes jambiers droits',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))
            ->add('axesJambiersGauches', ChoiceType::class, array(
                'label' => 'Axes jambiers gauches',
                'placeholder' => false,
                'choices' => array(
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%',
                    'Occlusion' => 'Occlusion'
                ),
                'required' => false,
            ))


            ->add('IPSReposDroit', NumberType::class, array(
                'label' => 'IPS repos droit',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            ->add('IPSReposGauche', NumberType::class, array(
                'label' => 'IPS repos gauche',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            ->add('IPSGrosOrteilDroit', NumberType::class, array(
                'label' => 'IPS repos gros orteil droit',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            ->add('IPSGrosOrteilGauche', NumberType::class, array(
                'label' => 'IPS repos gros orteil gauche',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            ->add('IPSEffortDroit', NumberType::class, array(
                'label' => 'IPS effort droit',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            ->add('IPSEffortGauche', NumberType::class, array(
                'label' => 'IPS effort gauche',
                'attr' => array(
                    'unity' => '',
                    'data-min' => '0.2',
                    'data-max' => '1.5',
                    'step' => '0.1',
                ),
                'required' => false,
            ))
            

            ->add('testStrandnessDistanceMax', IntegerType::class, array(
                'label' => 'Test de Strandness: distance max *',
                'attr' => array(
                    'unity' => 'm',
                    'data-min' => 0,
                    'data-max' => 9999,
                ),
                'required' => false,
            ))
            ->add('testStrandnessDistanceGene', IntegerType::class, array(
                'label' => 'Test de Strandness: distance de première gêne',
                'attr' => array(
                    'unity' => 'm',
                    'data-min' => 0,
                    'data-max' => 9999,
                ),
                'required' => false,
            ))
            ->add('arretPour', ChoiceType::class, array(
                'label' => 'Arrêt pour',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Douleur' => 'Douleur',
                    'Crampe' => 'Crampe',
                    'Fatigue' => 'Fatigue',
                ),
                'required' => false,
            ))
            ->add('vitesseOndePouls', IntegerType::class, array(
                'label' => 'Vélocité de l\'onde pouls',
                'attr' => array(
                    'unity' => 'm/sec.',
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
            'data_class' => EchographieVasculaire::class,
        ]);
    }
}
