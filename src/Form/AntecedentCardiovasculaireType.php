<?php

namespace App\Form;

use App\Entity\AntecedentCardiovasculaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AntecedentCardiovasculaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IDM_SCA', ChoiceType::class, array(
                'label' => 'IDM-SCA',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('angorStable', ChoiceType::class, array(
                'label' => 'Angor stable',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('angioplastieCoronaire', ChoiceType::class, array(
                'label' => 'Angioplastie coronaire',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('pontageCoronaire', ChoiceType::class, array(
                'label' => 'Pontage coronaire',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('insuffisanceCardiaque', ChoiceType::class, array(
                'label' => 'Insuffisance cardiaque stade III ou IV',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('AVC', ChoiceType::class, array(
                'label' => 'AVC',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('AIT', ChoiceType::class, array(
                'label' => 'AIT',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('endarteriectomieCarotidienne', ChoiceType::class, array(
                'label' => 'Endartériectomie carotidienne',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('arteriteMembresInferieurs', ChoiceType::class, array(
                'label' => 'Artérite des membres inférieurs',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('angioplastiePeripherique', ChoiceType::class, array(
                'label' => 'Angioplastie périphérique',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('pontagePeripherique', ChoiceType::class, array(
                'label' => 'Pontage périphérique',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('antecedentFibrillationAuriculaire', ChoiceType::class, array(
                'label' => 'Antécédent de fibrillation auriculaire',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('antecedentInsuffisanceCardiaque', ChoiceType::class, array(
                'label' => 'Antécédent d\'insuffisance cardiaque',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))
            ->add('valvulopathie', ChoiceType::class, array(
                'label' => 'Valvulopathie (>grade 2 ou >modérée)',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'block_name' => 'qcm_type',
                'required' => false,
            ))

            
            ->add('localisation', ChoiceType::class, array(
                'label' => 'Localisation',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Infarctus cérébelleux' => 'Infarctus cérébelleux',
                    'Infarctus de l\'artère cérébrale antérieure' => 'Infarctus de l\'artère cérébrale antérieure',
                    'Infarctus de l\'artère cérébrale moyenne profonde' => 'Infarctus de l\'artère cérébrale moyenne profonde',
                    'Infarctus de l\'artère cérébrale moyenne superficiel' => 'Infarctus de l\'artère cérébrale moyenne superficiel',
                    'Infarctus de l\'artère cérébrale moyenne superficiel et profonde' => 'Infarctus de l\'artère cérébrale moyenne superficiel et profonde',
                    'Infarctus de l\'artère cérébrale postérieure' => 'Infarctus de l\'artère cérébrale postérieure',
                    'Infarctus de l\'artère choroïdienne antérieure' => 'Infarctus de l\'artère choroïdienne antérieure',
                    'Infarctus du tronc cérébral : Territoire bulbaire' => 'Infarctus du tronc cérébral : Territoire bulbaire',
                    'Infarctus du tronc cérébral : Territoire mésencéphalique' => 'Infarctus du tronc cérébral : Territoire mésencéphalique',
                    'Infarctus du tronc cérébral : Territoire protubérantiel' => 'Infarctus du tronc cérébral : Territoire protubérantiel',
                    'Infarctus thalamiques' => 'Infarctus thalamiques',
                ),
                'required' => false,
            ))
            ->add('taille', ChoiceType::class, array(
                'label' => 'Taille',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    '< 15mm' => '< 15mm',
                    '> 15mm' => '> 15mm'
                ),
                'required' => false,
            ))
            ->add('mecanisme', ChoiceType::class, array(
                'label' => 'Mécanisme',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Athérothrombose affirmée' => 'Athérothrombose affirmée',
                    'Athérothrombose possible' => 'Athérothrombose possible',
                    'Atteinte des petits vaisseaux affirmée' => 'Atteinte des petits vaisseaux affirmée',
                    'Atteinte des petits vaisseaux possible' => 'InfirAtteinte des petits vaisseaux possiblemière',
                    'Autres causes (dissections, thrombocytémie, mal de systèmes) affirmée' => 'Autres causes (dissections, thrombocytémie, mal de systèmes) affirmée',
                    'Autres causes (dissections, thrombocytémie, mal de systèmes) possible' => 'Autres causes (dissections, thrombocytémie, mal de systèmes) possible',
                    'Cardio-embolique affirmée' => 'Cardio-embolique affirmée',
                    'Cardio-embolique possible' => 'Cardio-embolique possible'
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AntecedentCardiovasculaire::class,
        ]);
    }
}
