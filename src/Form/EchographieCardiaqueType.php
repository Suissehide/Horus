<?php

namespace App\Form;

use App\Entity\EchographieCardiaque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EchographieCardiaqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('date', DateType::class, array(
            'label' => 'Date de l\'echocardiographie',
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
        ->add('fcRepos', IntegerType::class, array(
            'label' => 'FC de repos',
            'attr' => array(
                'unity' => 'btms/min.',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('fcMax', IntegerType::class, array(
            'label' => 'FC max',
            'attr' => array(
                'unity' => 'btms/min.',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('rythmeCardiaque', ChoiceType::class, array(
            'label' => 'Rythme cardiaque',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'ESV bi ou trigéminées' => 'ESV bi ou trigéminées',
                'FA' => 'FA',
                'Sinusal' => 'Sinusal'
            ),
            'required' => false,
        ))
        ->add('taSystoliqueRepos', NumberType::class, array(
            'label' => 'TA systolique de repos',
            'attr' => array(
                'unity' => 'mmHg',
                'data-min' => 80,
                'data-max' => 200,
                'step' => '1',
            ),
            'required' => false,
        ))
        ->add('taSystoliquePic', NumberType::class, array(
            'label' => 'TA systolique au pic',
            'attr' => array(
                'unity' => 'mmHg',
                'data-min' => 80,
                'data-max' => 350,
                'step' => '1',
            ),
            'required' => false,
        ))


        ->add('basalEchographie', ChoiceType::class, array(
            'label' => 'Echographie',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Effort' => 'Effort',
                'Stress' => 'Stress'
            ),
            'required' => false,
        ))
        ->add('basalFMTPercent', IntegerType::class, array(
            'label' => 'Pourcentage FMT',
            'attr' => array(
                'unity' => '',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('basalResult', ChoiceType::class, array(
            'label' => 'Résultat',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Ischémique' => 'Ischémique',
                'Pas ischémique' => 'Pas ischémique'
            ),
            'required' => false,
        ))
        ->add('basalNumberSegment', IntegerType::class, array(
            'label' => 'Nombre de segment',
            'attr' => array(
                'unity' => '',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('basalIschemieLocation', ChoiceType::class, array(
            'label' => 'Localisation ischémie',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Antérieur' => 'Antérieur',
                'Latéral' => 'Latéral',
                'Antéro-latéral' => 'Antéro-latéral',
                'Inférieur' => 'Inférieur'
            ),
            'required' => false,
        ))


        ->add('stressEchographie', ChoiceType::class, array(
            'label' => 'Echographie',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Effort' => 'Effort',
                'Stress' => 'Stress'
            ),
            'required' => false,
        ))
        ->add('stressFMTPercent', IntegerType::class, array(
            'label' => 'Pourcentage FMT',
            'attr' => array(
                'unity' => '',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('stressResult', ChoiceType::class, array(
            'label' => 'Résultat',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Ischémique' => 'Ischémique',
                'Pas ischémique' => 'Pas ischémique'
            ),
            'required' => false,
        ))
        ->add('stressNumberSegment', IntegerType::class, array(
            'label' => 'Nombre de segment',
            'attr' => array(
                'unity' => '',
                'data-min' => 0,
                'data-max' => 0,
            ),
            'required' => false,
        ))
        ->add('stressIschemieLocation', ChoiceType::class, array(
            'label' => 'Localisation ischémie',
            'placeholder' => '',
            'choices' => array(
                '' => '',
                'Antérieur' => 'Antérieur',
                'Latéral' => 'Latéral',
                'Antéro-latéral' => 'Antéro-latéral',
                'Inférieur' => 'Inférieur'
            ),
            'required' => false,
        ))

        ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EchographieCardiaque::class,
        ]);
    }
}
