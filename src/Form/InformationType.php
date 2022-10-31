<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('susDecalage', ChoiceType::class, array(
                'label' => 'Sus-décalage du segment ST',
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
            ->add('sansSusDecalage', ChoiceType::class, array(
                'label' => 'Sans sus-décalage du segment ST',
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
            ->add('anterieur', ChoiceType::class, array(
                'label' => 'Antérieur',
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
            ->add('septoApical', ChoiceType::class, array(
                'label' => 'Septo-apical',
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
            ->add('lateral', ChoiceType::class, array(
                'label' => 'Latéral',
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
            ->add('inferieurPosterieur', ChoiceType::class, array(
                'label' => 'Inférieur / Postérieur',
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
            ->add('sansTerritoire', ChoiceType::class, array(
                'label' => 'Sans territoire',
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
            ->add('IVA', ChoiceType::class, array(
                'label' => 'IVA',
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
            ->add('CD', ChoiceType::class, array(
                'label' => 'CD',
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
            ->add('Cx', ChoiceType::class, array(
                'label' => 'Cx',
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
            ->add('marginale', ChoiceType::class, array(
                'label' => 'Marginale',
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
            ->add('diagonale', ChoiceType::class, array(
                'label' => 'Diagonale',
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
            ->add('pontage', ChoiceType::class, array(
                'label' => 'Pontage',
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
            ->add('troncCommun', ChoiceType::class, array(
                'label' => 'Tronc commun',
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


            ->add('traitementPhaseAigue', ChoiceType::class, array(
                'label' => 'Traitement à la phase aiguë',
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'choices' => array(
                    'Angioplastie' => 'Angioplastie',
                    'Fibrinolyse' => 'Fibrinolyse',
                    'Pontage' => 'Pontage',
                    'Traitement médical' => 'Traitement médical'
                ),
                'required' => false,
            ))


            ->add('troubleRythmeVentriculaire', ChoiceType::class, array(
                'label' => 'Trouble du rythme ventriculaire',
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
                'label' => 'Insuffisance cardiaque',
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
            ->add('pericardite', ChoiceType::class, array(
                'label' => 'Péricardite',
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
            ->add('complicationMecanique', ChoiceType::class, array(
                'label' => 'Complication mécanique',
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


            ->add('etiologieAtherosclerose', ChoiceType::class, array(
                'label' => 'Athérosclérose',
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    'Cause potentielle' => 'Cause potentielle',
                    'Cause incertaine' => 'Cause incertaine',
                    'Cause improbable' => 'Cause improbable',
                    'Pathologie absente' => 'Pathologie absente',
                    'Explorations insuffisantes pour statuer' => 'Explorations insuffisantes pour statuer'
                ),
                'required' => false
            ))
            ->add('etiologieMaladiePetitsArteres', ChoiceType::class, array(
                'label' => 'Maladie des petits artères',
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    'Cause potentielle' => 'Cause potentielle',
                    'Cause incertaine' => 'Cause incertaine',
                    'Cause improbable' => 'Cause improbable',
                    'Pathologie absente' => 'Pathologie absente',
                    'Explorations insuffisantes pour statuer' => 'Explorations insuffisantes pour statuer'
                ),
                'required' => false
            ))
            ->add('etiologieCardioEmbolique', ChoiceType::class, array(
                'label' => 'Cardio-embolique',
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    'Cause potentielle' => 'Cause potentielle',
                    'Cause incertaine' => 'Cause incertaine',
                    'Cause improbable' => 'Cause improbable',
                    'Pathologie absente' => 'Pathologie absente',
                    'Explorations insuffisantes pour statuer' => 'Explorations insuffisantes pour statuer'
                ),
                'required' => false
            ))
            ->add('etiologieAutreCause', ChoiceType::class, array(
                'label' => 'Autre cause',
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    'Cause potentielle' => 'Cause potentielle',
                    'Cause incertaine' => 'Cause incertaine',
                    'Cause improbable' => 'Cause improbable',
                    'Pathologie absente' => 'Pathologie absente',
                    'Explorations insuffisantes pour statuer' => 'Explorations insuffisantes pour statuer'
                ),
                'required' => false
            ))
            ->add('etiologieDissection', ChoiceType::class, array(
                'label' => 'Dissection',
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    'Cause potentielle' => 'Cause potentielle',
                    'Cause incertaine' => 'Cause incertaine',
                    'Cause improbable' => 'Cause improbable',
                    'Pathologie absente' => 'Pathologie absente',
                    'Explorations insuffisantes pour statuer' => 'Explorations insuffisantes pour statuer'
                ),
                'required' => false
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
