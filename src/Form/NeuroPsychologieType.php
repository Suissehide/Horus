<?php

namespace App\Form;

use App\Entity\NeuroPsychologie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NeuroPsychologieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rankin', IntegerType::class, array(
                'label' => 'Rankin *',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('MMSE', IntegerType::class, array(
                'label' => 'MMSE *',
                'attr' => array(
                    'unity' => '/ 30',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('MOCA', IntegerType::class, array(
                'label' => 'MOCA *',
                'attr' => array(
                    'unity' => '/ 30',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('HADAnxiete', IntegerType::class, array(
                'label' => 'HAD anxiété *',
                'attr' => array(
                    'unity' => '/ 15',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('HADDepression', IntegerType::class, array(
                'label' => 'HAD dépression *',
                'attr' => array(
                    'unity' => '/ 15',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('barriereLangue', ChoiceType::class, array(
                'label' => 'Barrière langue',
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
            ->add('niveauSocioEducatif', ChoiceType::class, array(
                'label' => 'Niveau socio-éducatif',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Ne sait pas compter' => 'Ne sait pas compter',
                    'Ne sait pas lire' => 'Ne sait pas lire',
                    'Ne sait ni lire ni compter' => 'Ne sait ni lire ni compter',
                    'Aucune difficulté' => 'Aucune difficulté'
                ),
                'required' => false,
            ))
            ->add('aphasie', ChoiceType::class, array(
                'label' => 'Aphasie',
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
            ->add('difficultesMouvementFin', ChoiceType::class, array(
                'label' => 'Difficultés mouvement fin',
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

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NeuroPsychologie::class,
        ]);
    }
}
