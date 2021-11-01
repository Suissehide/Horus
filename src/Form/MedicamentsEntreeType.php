<?php

namespace App\Form;

use App\Entity\MedicamentsEntree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MedicamentsEntreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreMedicamentsJour', IntegerType::class, array(
                'label' => 'Nombre de médicaments par jour',
                'attr' => array(
                    'unity' => 'médicament/jour',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('nombrePrisesSemaine', IntegerType::class, array(
                'label' => 'Nombre de prises par semaine',
                'attr' => array(
                    'unity' => 'prises/semaine',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('pilulier', ChoiceType::class, array(
                'label' => 'Réponse',
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
            ->add('gestion', ChoiceType::class, array(
                'label' => 'Gestion',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Personnelle' => 'Personnelle',
                    'Familiale' => 'Familiale',
                    'Infirmière' => 'Infirmière',
                    'Tiers' => 'Tiers'
                ),
                'required' => false,
            ))
            ->add('priseDecalee', ChoiceType::class, array(
                'label' => 'Prise en décalée',
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
            ->add('geneHeurePrise', ChoiceType::class, array(
                'label' => 'Gêne heure prise',
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
            ->add('evaluation', ChoiceType::class, array(
                'label' => 'Évaluation de l\'observance possible',
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
            ->add('score', IntegerType::class, array(
                'label' => 'Score observance CEPTA',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('medicaments', CollectionType::class, [
                'entry_type' => MedicamentType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
            ])
        
            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MedicamentsEntree::class,
        ]);
    }
}
