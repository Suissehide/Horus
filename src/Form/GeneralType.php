<?php

namespace App\Form;

use App\Entity\General;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GeneralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', ChoiceType::class, array(
                'label' => 'Civilité',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Docteur' => 'Docteur',
                    'Madame' => 'Madame',
                    'Mademoiselle' => 'Mademoiselle',
                    'Monsieur' => 'Monsieur',
                    'Professeur' => 'Professeur',
                ),
                'required' => false,
            ))
            ->add('nom', TextType::class, array(
                'label' => "Nom",
                'attr' => array(
                    'placeholder' => 'Nom'
                ),
                'required' => false,
            ))
            ->add('prenom', TextType::class, array(
                'label' => "Prénom",
                'attr' => array(
                    'placeholder' => 'Prénom'
                ),
                'required' => false,
            ))
            ->add('dateNaissance', DateType::class, array(
                'label' => 'Date de naissance',
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
            ->add('sexe', ChoiceType::class, array(
                'label' => 'Sexe',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Féminin' => 'Féminin',
                    'Inconnu' => 'Inconnu',
                    'Masculin' => 'Masculin',
                ),
                'required' => false,
            ))
            ->add('nomNaissance', TextType::class, array(
                'label' => "Nom de naissance",
                'attr' => array(
                    'placeholder' => 'Nom de naissance'
                ),
                'required' => false,
            ))
            ->add('profession', ChoiceType::class, array(
                'label' => 'Profession',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Autres personnes sans activité professionelle' => 'Autres personnes sans activité professionelle',
                    'Retraités' => 'Retraités',
                    'Artisans, commerçants et chefs d\'entreprise' => 'Artisans, commerçants et chefs d\'entreprise',
                    'Employés' => 'Employés',
                    'Professions intermédiaires' => 'Professions intermédiaires',
                    'Cadres et professions intellectuelles supérieures' => 'Cadres et professions intellectuelles supérieures',
                    'Agriculteurs exploitants' => 'Agriculteurs exploitants',
                    'Ouvriers' => 'Ouvriers',
                ),
                'required' => false,
            ))
            ->add('statutActuel', ChoiceType::class, array(
                'label' => 'Statut actuel',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Arrêt de travail' => 'Arrêt de travail',
                    'Reprise' => 'Reprise',
                    'Reclassement' => 'Reclassement',
                    'Invalidité' => 'Invalidité',
                    'Retraite' => 'Retraite',
                    'Autre' => 'Autre'
                ),
                'required' => false,
            ))
            ->add('niveauEtude', ChoiceType::class, array(
                'label' => 'Niveau d\'étude',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Primaire' => 'Primaire',
                    'Secondaire' => 'Secondaire',
                    'Universitaire' => 'Universitaire'
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => General::class,
        ]);
    }
}
