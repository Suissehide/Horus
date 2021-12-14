<?php

namespace App\Form;

use App\Entity\EchographieVasculaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DecimalType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EchographieVasculaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carotideInterneDroite', ChoiceType::class, array(
                'label' => 'Carotide interne droite',
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
            ->add('carotideInterneGauche', ChoiceType::class, array(
                'label' => 'Carotide interne gauche',
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
            ->add('vertebraleGauche', ChoiceType::class, array(
                'label' => 'Vertébrale gauche',
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
            ->add('carotideCommuneDroite', ChoiceType::class, array(
                'label' => 'Carotide commune droite',
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
            ->add('carotideCommuneGauche', ChoiceType::class, array(
                'label' => 'Carotide commune gauche',
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
            ->add('sousClaviereDroite', ChoiceType::class, array(
                'label' => 'Sous-clavière droite',
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
            ->add('sousClaviereGauche', ChoiceType::class, array(
                'label' => 'Sous-clavière gauche',
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
            ->add('TSAAorte', IntegerType::class, array(
                'label' => 'Aorte',
                'attr' => array(
                    'unity' => 'mm',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))


            ->add('membresInferieurAorte', IntegerType::class, array(
                'label' => 'Aorte',
                'attr' => array(
                    'unity' => 'mm',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('iliaqueDroite', ChoiceType::class, array(
                'label' => 'Iliaque droite',
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
            ->add('iliaqueGauche', ChoiceType::class, array(
                'label' => 'Iliaque gauche',
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
            ->add('femoraleCommuneDroite', ChoiceType::class, array(
                'label' => 'Fémorale commune droite',
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
            ->add('femoraleCommuneGauche', ChoiceType::class, array(
                'label' => 'Fémorale commune gauche',
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
            ->add('femoraleSuperficielleDroite', ChoiceType::class, array(
                'label' => 'Fémorale superficielle droite',
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
            ->add('femoraleSuperficielleGauche', ChoiceType::class, array(
                'label' => 'Fémorale superficielle gauche',
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
            ->add('popliteDroite', ChoiceType::class, array(
                'label' => 'Poplite droite',
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
            ->add('popliteGauche', ChoiceType::class, array(
                'label' => 'Poplite gauche',
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
            ->add('axesJambiersDroits', ChoiceType::class, array(
                'label' => 'Axes jambiers droits',
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
            ->add('axesJambiersGauches', ChoiceType::class, array(
                'label' => 'Axes jambiers gauches',
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
            

            ->add('testStandness', IntegerType::class, array(
                'label' => 'Test de Standness: distance max *',
                'attr' => array(
                    'unity' => 'm',
                    'data-min' => 0,
                    'data-max' => 9999,
                ),
                'required' => false,
            ))
            ->add('pressionSystolique', IntegerType::class, array(
                'label' => 'Pression systolique',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('pressionDiastolique', IntegerType::class, array(
                'label' => 'Pression diastolique',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('frequenceCardiaque', IntegerType::class, array(
                'label' => 'Fréquence cardiaque',
                'attr' => array(
                    'unity' => 'btms/min.',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('velociteOndePouls', IntegerType::class, array(
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
