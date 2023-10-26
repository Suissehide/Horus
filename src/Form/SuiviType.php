<?php

namespace App\Form;

use App\Entity\Suivi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuiviType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('recidive', ChoiceType::class, array(
                'label' => 'Récidive d\'événement cardiovasculaire',
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
            ->add('dateSurvenue', DateType::class, array(
                'label' => 'Date de survenue',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'placeholder' => 'dd/mm/yyyy',
                    'class' => 'datepicker',
                    'autocomplete' => 'off',
                ],
                'html5' => false,
                'required' => false,
            ))
            ->add('type', ChoiceType::class, array(
                'label' => 'Type d\'événement',
                'choices' => array(
                    'Infarctus du myocarde' => 'Infarctus du myocarde',
                    'AVC ischémique d\'origine athéromateuse' => 'AVC ischémique d\'origine athéromateuse',
                    'Revascularisation coronarienne' => 'Revascularisation coronarienne',
                    'Autre' => 'Autre',
                ),
                'required' => false,
            ))
            ->add('dyspnee', IntegerType::class, array(
                'label' => 'Dyspnée',
                'attr' => array(
                    'unity' => 'NYHA',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('douleur', IntegerType::class, array(
                'label' => 'Douleur thoracique',
                'attr' => array(
                    'unity' => 'CCS',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('tabac', ChoiceType::class, array(
                'label' => 'Tabac',
                'choices' => array(
                    'Fumeur actuel' => 'Fumeur actuel',
                    'Arrêt depuis moins de 12 mois' => 'Arrêt depuis moins de 12 mois',
                    'Jamais fumé ou arrêté > 12 mois' => 'Jamais fumé ou arrêté > 12 mois',
                ),
                'required' => false,
            ))
            ->add('activite', ChoiceType::class, array(
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
            ->add('hba1c', ChoiceType::class, array(
                'label' => 'HbA1C',
                'choices' => array(
                    '≥ 6.5%' => '≥ 6.5%',
                    '5.7%-6.4% sans traitement ou < 5.7% avec traitement' => '5.7%-6.4% sans traitement ou < 5.7% avec traitement',
                    '< 5.7% sans traitement' => '< 5.7% sans traitement'
                ),
                'required' => false
            ))
            ->add('hypertension', ChoiceType::class, array(
                'label' => 'Hypertension artérielle',
                'choices' => array(
                    '≥ 140/90 mmHg' => '≥ 140/90 mmHg',
                    '120-139/80-89 mmHg sans traitement ou < 120/80 avec traitement' => '120-139/80-89 mmHg sans traitement ou < 120/80 avec traitement',
                    '< 120/80 sans traitement' => '< 120/80 sans traitement'
                ),
                'required' => false
            ))
            ->add('dyslipidemie', ChoiceType::class, array(
                'label' => 'Dyslipidémie',
                'choices' => array(
                    'Cholestérol total > 2.40 g/L' => 'Cholestérol total > 2.40 g/L',
                    'Cholestérol total < 2.00 g/L avec traitement ou 2.00-2.39 g/L sans traitement' => 'Cholestérol total < 2.00 g/L avec traitement ou 2.00-2.39 g/L sans traitement',
                    'Cholestérol total < 2.00 g/L sans traitement' => 'Cholestérol total < 2.00 g/L sans traitement'
                ),
                'required' => false
            ))
            ->add('poids', ChoiceType::class, array(
                'label' => 'Poids',
                'choices' => array(
                    'IMC ≥ 30 kg/m2' => 'IMC ≥ 30 kg/m2',
                    'IMC 25-29.9 kg/m2' => 'IMC 25-29.9 kg/m2',
                    'IMC < 25 kg/m2' => 'IMC < 25 kg/m2'
                ),
                'required' => false
            ))
            ->add('score', TextType::class, array(
                'label' => 'Score globale',
                'required' => false
            ))
            ->add('facteurs', CollectionType::class, array(
                'entry_type' => QCMType::class,
                // 'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
                'block_name' => 'qcm_type',
            ))
            ->add('traitement', CollectionType::class, array(
                'entry_type' => QCMType::class,
                // 'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
                'block_name' => 'qcm_type',
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
            ->add('crp', NumberType::class, array(
                'label' => 'CRP ultra-sensible',
                'attr' => array(
                    'unity' => 'mg/L',
                    'data-min' => 0,
                    'data-max' => 100,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('triglycerides', NumberType::class, array(
                'label' => 'Triglycérides',
                'scale' => 2,
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 100,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('ldl', NumberType::class, array(
                'label' => 'LDL-c',
                'scale' => 2,
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 100,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('hdl', NumberType::class, array(
                'label' => 'HDL-c',
                'scale' => 2,
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 100,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('save', SubmitType::class, ['label' => 'Sauvegarder']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suivi::class,
        ]);
    }
}
