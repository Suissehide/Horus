<?php

namespace App\Form;

use App\Entity\NeuroImagerie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NeuroImagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NeuroImagerie::class,
        ]);
    }
}
