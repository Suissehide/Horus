<?php

namespace App\Form;

use App\Entity\Protocole;

use App\Form\MedicamentsEntreeType;
use App\Form\AngioplastiePontageType;
use App\Form\BFRType;
use App\Form\CatheterisationType;
use App\Form\AnatomieCoronaireType;
use App\Form\EchographieType;
use App\Form\EchographieCardiaqueType;
use App\Form\EchographieVasculaireType;
use App\Form\NeuroPsychologieType;
use App\Form\ScintigraphieType;
use App\Form\TestEffortType;
use App\Form\VisiteType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtocoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('angioplastiePontage', AngioplastiePontageType::class, array(
                'label' => 'Angioplastie Pontage'
            ))
            ->add('BFR', BFRType::class, array(
                'label' => 'Données BFR'
            ))
            ->add('catheterisation', CatheterisationType::class, array(
                'label' => 'Cathétérisation'
            ))
            ->add('anatomieCoronaire', AnatomieCoronaireType::class, array(
                'label' => 'Coronaire et angioplastie'
            ))
            ->add('echographie', EchographieType::class, array(
                'label' => 'Echographie'
            ))
            ->add('echographieCardiaque', EchographieCardiaqueType::class, array(
                'label' => 'Echographie cardiaque'
            ))
            ->add('echographieVasculaire', EchographieVasculaireType::class, array(
                'label' => 'Echographie vasculaire'
            ))
            ->add('medicamentsEntree', MedicamentsEntreeType::class, array(
                'label' => 'Médicament'
            ))
            ->add('neuroPsychologie', NeuroPsychologieType::class, array(
                'label' => 'Neuro-psychologie'
            ))
            ->add('scintigraphie', ScintigraphieType::class, array(
                'label' => 'Scintigraphie'
            ))
            ->add('testEffort', TestEffortType::class, array(
                'label' => 'Épreuve d\'effort'
            ))
            ->add('suivi', SuiviType::class, array(
                'label' => 'Suivi'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Protocole::class,
        ]);
    }
}
