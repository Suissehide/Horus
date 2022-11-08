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
                'label' => 'Taille (en cm)',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 100,
                    'data-max' => 260,
                ),
                'required' => false,
            ))
            ->add('poids', IntegerType::class, array(
                'label' => 'Poids (en kg)',
                'attr' => array(
                    'unity' => 'kg',
                    'data-min' => 10,
                    'data-max' => 500,
                ),
                'required' => false,
            ))
            ->add('tourTaille', IntegerType::class, array(
                'label' => 'Tour de taille (en cm)',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 10,
                    'data-max' => 200,
                ),
                'required' => false,
            ))


            ->add('tensionArterielleSystoliqueJour', NumberType::class, array(
                'label' => 'Systolique jour (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleDiastoliqueJour', NumberType::class, array(
                'label' => 'Diastolique jour (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false
            ))
            ->add('tensionArterielleSystoliqueNuit', NumberType::class, array(
                'label' => 'Systolique nuit (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleDiastoliqueNuit', NumberType::class, array(
                'label' => 'Diastolique nuit (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false
            ))
            ->add('HVG', ChoiceType::class, array(
                'label' => 'HVG',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Non' => 'Non',
                    'Electrique' => 'Electrique',
                    'Echographique' => 'Echographique',
                ),
                'required' => false
            ))


            ->add('cholesterolTotal', NumberType::class, array(
                'label' => 'Cholestérol total (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('triglicerides', NumberType::class, array(
                'label' => 'Triglicérides (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('HDLC', NumberType::class, array(
                'label' => 'HDL-C (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('LDLC', NumberType::class, array(
                'label' => 'LDL-C (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('scoreDUTCH', ChoiceType::class, array(
                'label' => 'Score de DUTCH',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    '0-2 HF peu probable' => '0-2 HF peu probable',
                    '3-5 HF possible' => '3-5 HF possible',
                    '6-8 HF probable' => '6-8 HF probable',
                    '>8 HF certaine' => '>8 HF certaine',
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

            ->add('diabeteType', ChoiceType::class, array(
                'label' => 'Type',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Type 1' => 'Type 1',
                    'Type 2' => 'Type 2',
                ),
                'required' => false,
            ))
            ->add('diabeteDepuis', ChoiceType::class, array(
                'label' => 'Depuis',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    '< 5 ans' => '< 5 ans',
                    '< 10 ans' => '< 10 ans',
                    '< 15 ans' => '< 15 ans',
                    '< 20 ans' => '< 20 ans',
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
            ->add('fondOeil', ChoiceType::class, array(
                'label' => 'Fond d\'oeil',
                'choices' => array(
                    'Non Renseigné' => 'Non Renseigné',
                    'Normal' => 'Normal',
                    'Anormal' => 'Anormal'
                ),
                'required' => false,
            ))
            ->add('neuropathieClinique', ChoiceType::class, array(
                'label' => 'Neuropathie clinique (DN4)',
                'choices' => array(
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

            ->add('neuroesthesiometriePiedDroit', NumberType::class, array(
                'label' => 'Neuroesthésiométrie pied droit (en volt)',
                'attr' => array(
                    'unity' => 'volt',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('neuroesthesiometriePiedGauche', NumberType::class, array(
                'label' => 'Neuroesthésiométrie pied gauche (en volt)',
                'attr' => array(
                    'unity' => 'volt',
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
            ->add('debitFiltrationGlomerulaire', NumberType::class, array(
                'label' => 'Débit de filtration glomerulaire CK-EPI',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('microAlbuminurie', NumberType::class, array(
                'label' => 'Microalbuminurie',
                'attr' => array(
                    'unity' => 'mg/24h',
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
                'label' => 'Gamma GT',
                'attr' => array(
                    'unity' => 'U/L',
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
            ->add('hemoglobine', NumberType::class, array(
                'label' => 'Hémoglobine',
                'attr' => array(
                    'unity' => 'g/dL',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('VGM', NumberType::class, array(
                'label' => 'VGM',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('plaquettes', NumberType::class, array(
                'label' => 'Plaquettes',
                'attr' => array(
                    'unity' => '10^9/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('TSH', NumberType::class, array(
                'label' => 'TSH',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            
            ->add('activitePhysique', ChoiceType::class, array(
                'label' => 'Activité physique',
                'choices' => array(
                    'Aucune' => 'Aucune',
                    '1 à 150 min/semaine d\'activité modérée ou 1 à 75 min/semaine d\'activité vigoureuse' => '1 à 150 min/semaine d\'activité modérée ou 1 à 75 min/semaine d\'activité vigoureuse',
                    '> 150 min/semaine d\'activité modérée ou > 75 min/semaine d\'activité vigoureuse' => '> 150 min/semaine d\'activité modérée ou > 75 min/semaine d\'activité vigoureuse'
                ),
                'required' => false,
            ))

            ->add('alimentation', ChoiceType::class, array(
                'label' => 'Alimentation',
                'multiple' => true,
                'expanded' => true,
                'choices' => array(
                    '≥ 4 ou 5 fruits et légumes/jours' => '≥ 4 ou 5 fruits et légumes/jours',
                    '≥ 2 portions de poisson/semaine' => '≥  2 portions de poisson/semaine',
                    '≥ 3 portions de céréales ou fibres/semaine' => '≥ 3 portions de céréales ou fibres/semaine',
                    '< 15g de sel/jour' => '< 15g de sel/jour',
                    '≤ 1 boisson sucrée/semaine' => '≤ 1 boisson sucrée/semaine',
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BFR::class,
        ]);
    }
}
