<?php

namespace App\Form;

use App\Entity\Facteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FacteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('risqueHTA', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))
            ->add('depuisHTA', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => 'ans',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('traiteHTA', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))

            ->add('risqueDiabete', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))
            ->add('depuisDiabete', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => 'ans',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('traiteDiabete', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))

            ->add('risqueHypercholesterolemie', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))
            ->add('depuisHypercholesterolemie', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => 'ans',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('traiteHypercholesterolemie', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))

            ->add('risqueHypertriglyceridemie', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))
            ->add('depuisHypertriglyceridemie', IntegerType::class, array(
                'label' => ' ',
                'attr' => array(
                    'unity' => 'ans',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('traiteHypertriglyceridemie', CheckboxType::class, array(
                'label' => ' ',
                'required' => false
            ))

            ->add('obesite', CheckboxType::class, array(
                'label' => 'Obésité',
                'required' => false
            ))
            ->add('alcoolisme', CheckboxType::class, array(
                'label' => 'Alcoolisme',
                'required' => false
            ))
            ->add('sevre', CheckboxType::class, array(
                'label' => 'Sevré',
                'required' => false
            ))
            ->add('tabagisme', ChoiceType::class, array(
                'label' => 'État',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
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
            ->add('antecedentFamiliaux', CheckboxType::class, array(
                'label' => 'Antécédent familiaux',
                'required' => false
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facteur::class,
        ]);
    }
}
