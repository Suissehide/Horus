<?php

namespace App\Form;

use App\Entity\MedicamentsEntree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MedicamentsEntreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NbMedicamentSemaine', IntegerType::class, array(
                'label' => 'Nombre d\'unités de prise de médicament (par semaine)',
                'attr' => array(
                    'unity' => 'par semaine',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('DelaiSousTraitement', IntegerType::class, array(
                'label' => 'Délai depuis la mise sous traitement (en mois)',
                'attr' => array(
                    'unity' => 'en mois',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('pilulier', ChoiceType::class, array(
                'label' => 'Pilulier',
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
            ->add('gestionMedicaments', ChoiceType::class, array(
                'label' => 'Gestion des médicaments',
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'choices' => array(
                    'Personnelle' => 'Personnelle',
                    'Tiers' => 'Tiers'
                ),
                'required' => false,
            ))
            ->add('satisfaction', ChoiceType::class, array(
                'label' => 'Satisfaction pratique de la prise de traitement',
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
            ->add('ConnaissanceDureeTraitement', ChoiceType::class, array(
                'label' => 'Connaissance de la durée de traitement',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'À vie' => 'À vie',
                    'S\'interroge' => 'S\'interroge',
                    'Pense arrêter un jour' => 'Pense arrêter un jour',
                ),
                'required' => false,
            ))
            ->add('scoreMasCard', IntegerType::class, array(
                'label' => 'Score échelle adhésion MasCard (/5)',
                'attr' => array(
                    'unity' => '/ 5',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('problemes', ChoiceType::class, array(
                'label' => 'Item problèmes',
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'choices' => array(
                    'Q1' => 'Q1',
                    'Q2' => 'Q2',
                    'Q3' => 'Q3',
                    'Q4' => 'Q4',
                    'Q5' => 'Q5'
                ),
                'required' => false,
            ))
            ->add('remarques', TextType::class, array(
                'label' => "Remarques",
                'required' => false,
            ))

            ->add('effetIndesirable', ChoiceType::class, array(
                'label' => 'Effet indésirable ressenti au moment de l\'enquête',
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
            ->add('lequel', TextType::class, array(
                'label' => "Si oui lequel(s)",
                'required' => false,
            ))

            ->add('verbatimsMedicaments', TextareaType::class, array(
                'label' => 'Verbatims vécu des médicaments',
                'required' => false,
            ))
            
            ->add('verbatims', CollectionType::class, array(
                'entry_type' => QCMType::class,
                // 'entry_options' => array('label' => false),
                'allow_add' => false,
                'by_reference' => false,
                'block_name' => 'qcm_type',
            ))

            ->add('verbatimsApportSante', TextareaType::class, array(
                'label' => 'Verbatims apport des médicaments pour la santé',
                'required' => false,
            ))

            ->add('verbatimsSante', CollectionType::class, array(
                'entry_type' => QCMType::class,
                // 'entry_options' => array('label' => false),
                'allow_add' => false,
                'by_reference' => false,
                'block_name' => 'qcm_type',
            ))

            ->add('vecuTraitement', ChoiceType::class, array(
                'label' => 'Vécu du traitement',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    'Positif' => 'Positif',
                    'Négatif' => 'Négatif',
                    'Neutre' => 'Neutre',
                ),
                'required' => false,
            ))

            ->add('questionnaire', CollectionType::class, array(
                'entry_type' => BMQType::class,
                // 'entry_options' => array('label' => false),
                'allow_add' => false,
                'by_reference' => false,
                'block_name' => 'qcm_type',
            ))

            // ->add('medicaments', CollectionType::class, [
            //     'entry_type' => MedicamentType::class,
            //     'entry_options' => ['label' => false],
            //     'allow_add' => true,
            //     'by_reference' => false,
            // ])
        
            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MedicamentsEntree::class,
        ]);
    }
}
