<?php

namespace App\Form;

use App\Entity\BFR;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BFRType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille', IntegerType::class, array(
                'label' => 'Taille',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 100,
                    'data-max' => 260,
                ),
                'required' => false,
            ))
            ->add('poids', IntegerType::class, array(
                'label' => 'Poids',
                'attr' => array(
                    'unity' => 'kg',
                    'data-min' => 10,
                    'data-max' => 500,
                ),
                'required' => false,
            ))
            ->add('tourTaille', IntegerType::class, array(
                'label' => 'Tour de taille',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 10,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleJour', IntegerType::class, array(
                'label' => 'Jour',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleNuit', IntegerType::class, array(
                'label' => 'Nuit',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false
            ))

            ->add('transaminasesASAT', NumberType::class, array(
                'label' => 'Transaminases ASAT',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('transaminasesALAT', NumberType::class, array(
                'label' => 'Transaminases ALAT',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('gamma', NumberType::class, array(
                'label' => 'Gamma',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('proteinurie', NumberType::class, array(
                'label' => 'Protéinurie',
                'attr' => array(
                    'unity' => 'g/l',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('microAlbuminurie', NumberType::class, array(
                'label' => 'MicroAlbuminurie',
                'attr' => array(
                    'unity' => 'mg/24h',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('creatinine', NumberType::class, array(
                'label' => 'Créatinine',
                'attr' => array(
                    'unity' => 'umol/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('clairence', NumberType::class, array(
                'label' => 'Clairence',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('homoCysBasale', NumberType::class, array(
                'label' => 'HomoCys basale',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('cholesterolTotal', NumberType::class, array(
                'label' => 'Cholestérol total',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('triglicerides', NumberType::class, array(
                'label' => 'Triglicérides',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('HDLC', NumberType::class, array(
                'label' => 'HDL-C',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('LDLC', NumberType::class, array(
                'label' => 'LDL-C',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('glycemieAjeun', NumberType::class, array(
                'label' => 'Glycémie ajeûn',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('glycemiePostPrandiale', NumberType::class, array(
                'label' => 'Glycémie post prandiale',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('Hba1c', IntegerType::class, array(
                'label' => 'Hba1c',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('neuropathieClinique', ChoiceType::class, array(
                'label' => 'Neuropathie clinique',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Background (micro-anévrysme ou oedème)' => 'Background (micro-anévrysme ou oedème)',
                    'Ischémique' => 'Ischémique',
                    'Proliférative' => 'Proliférative',
                    'Laser' => 'Laser',
                    'Anormal sans précision' => 'Anormal sans précision',
                    'Non fait' => 'Non fait'
                ),
                'required' => false,
            ))
            ->add('fondOeil', ChoiceType::class, array(
                'label' => 'fond d\'oeil',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Non Renseigné' => 'Non Renseigné',
                    'Normal' => 'Normal',
                    'Anormal' => 'Anormal'
                ),
                'required' => false,
            ))
            ->add('neuroesthesiometriePiedDroit', NumberType::class, array(
                'label' => 'Neuroesthésiométrie pied droit',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('neuroesthesiometriePiedGauche', NumberType::class, array(
                'label' => 'Neuroesthésiométrie pied gauche',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))

            ->add('fibrinogene', NumberType::class, array(
                'label' => 'Fibrinogène',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('CRP', NumberType::class, array(
                'label' => 'CRP',
                'attr' => array(
                    'unity' => 'mmol/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('VS', NumberType::class, array(
                'label' => 'VS',
                'attr' => array(
                    'unity' => 'mm',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('plaquettes', NumberType::class, array(
                'label' => 'transaminasesASAT',
                'attr' => array(
                    'unity' => '10^9/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('globulesBlancs', NumberType::class, array(
                'label' => 'transaminasesASAT',
                'attr' => array(
                    'unity' => '10^9/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('hemoglobine', NumberType::class, array(
                'label' => 'transaminasesASAT',
                'attr' => array(
                    'unity' => 'g/dL',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))

            
            ->add('activitePhysique', ChoiceType::class, array(
                'label' => 'Activité physique',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Non Renseigné' => 'Non Renseigné',
                    'Faible' => 'Faible',
                    'Recommandé (> 30mm, 3 fois/semaine)' => 'Recommandé (> 30mm, 3 fois/semaine)'
                ),
                'required' => false,
            ))


            ->add('tabagisme', ChoiceType::class, array(
                'label' => 'État',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Non fumeur' => 'Non fumeur',
                    'Ancien fumeur' => 'Ancien fumeur',
                    'Fumeur' => 'Fumeur',
                ),
                'required' => false,
            ))
            ->add('dateArret', DateType::class, array(
                'label' => 'Date d\'arrêt',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'placeholder' => 'dd/mm/yyyy',
                    'class' => 'datepicker',
                    'autocomplete' => 'off'
                ],
                'html5' => false,
                'required' => false,
            ))
            ->add('nombrePaquetsAn', IntegerType::class, array(
                'label' => 'Nombres de paquets par an',
                'attr' => array(
                    'unity' => 'paquets/an',
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
            'data_class' => BFR::class,
        ]);
    }
}
