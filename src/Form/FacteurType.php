<?php

namespace App\Form;

use App\Entity\Facteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FacteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('antecedentFamiliaux', ChoiceType::class, array(
                'label' => 'Antécédent familiaux',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))

            ->add('risqueHTA', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
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
            ->add('traiteHTA', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))

            ->add('risqueDiabete', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
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
            ->add('traiteDiabete', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))

            ->add('risqueHypercholesterolemie', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
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
            ->add('traiteHypercholesterolemie', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))

            ->add('risqueHypertriglyceridemie', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
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
            ->add('traiteHypertriglyceridemie', ChoiceType::class, array(
                'label' => ' ',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Non précisé' => 'Non précisé',
                ),
                'required' => false,
            ))

            ->add('LDLMaximal', NumberType::class, array(
                'label' => 'LDL maximal au cours de la vie (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.01'
                ),
                'required' => false
            ))
            ->add('ageIntroductionTraitementHypolipemiant', IntegerType::class, array(
                'label' => 'Âge d’introduction du traitement hypolipémiant (en années)',
                'attr' => array(
                    'unity' => 'années',
                    'data-min' => 0,
                    'data-max' => 0,
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

            ->add('obesite', ChoiceType::class, array(
                'label' => 'État',
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
            ->add('alcoolisme', ChoiceType::class, array(
                'label' => 'État',
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
            ->add('sevre', ChoiceType::class, array(
                'label' => 'Sevré',
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

            ->add('cannabis', ChoiceType::class, array(
                'label' => 'État',
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

            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facteur::class,
        ]);
    }
}
