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


            ->add('causePotentielleAtherosclerose', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeIncertaineAtherosclerose', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeImprobableAtherosclerose', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('pathologieAbsenteAtherosclerose', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('explorationsInsuffisantesAtherosclerose', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))

            ->add('causePotentielleMaladiePetitsArteres', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeIncertaineMaladiePetitsArteres', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeImprobableMaladiePetitsArteres', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('pathologieAbsenteMaladiePetitsArteres', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('explorationsInsuffisanteMaladiePetitsArteres', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))

            ->add('causePotentielleCardioEmbolique', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeIncertaineCardioEmbolique', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeImprobableCardioEmbolique', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('pathologieAbsenteCardioEmbolique', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('explorationsInsuffisanteCardioEmbolique', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))

            ->add('causePotentielleAutreCause', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeIncertaineAutreCause', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeImprobableAutreCause', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('pathologieAbsenteAutreCause', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('explorationsInsuffisanteAutreCause', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))

            ->add('causePotentielleDissection', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeIncertaineDissection', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('causeImprobableDissection', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('pathologieAbsenteDissection', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
                ),
                'required' => false
            ))
            ->add('explorationsInsuffisanteDissection', ChoiceType::class, array(
                'label' => false,
                'expanded' => false,
                'multiple' => false,
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '0' => '0',
                    '9' => '9'
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
