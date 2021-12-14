<?php

namespace App\Form;

use App\Entity\Protocole;

use App\Form\MedicamentsEntreeType;
use App\Form\AngioplastiePontageType;
use App\Form\BFRType;
use App\Form\CatheterisationType;
use App\Form\EchocardiographieType;
use App\Form\EchographieVasculaireType;
use App\Form\NeuroImagerieType;
use App\Form\NeuroPsychologieType;
use App\Form\TestEffortType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtocoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fiches')

            ->add('angioplastiePontage', AngioplastiePontageType::class, array(
                'label' => 'Angioplastie Pontage'
            ))
            ->add('BFR', BFRType::class, array(
                'label' => 'Données BFR'
            ))
            ->add('catheterisation', CatheterisationType::class, array(
                'label' => 'Cathétérisation'
            ))
            ->add('echocardiographie', EchocardiographieType::class, array(
                'label' => 'Echocardiographie'
            ))
            ->add('echographieVasculaire', EchographieVasculaireType::class, array(
                'label' => 'Echographie vasculaire'
            ))
            ->add('medicamentsEntree', MedicamentsEntreeType::class, array(
                'label' => 'Médicament à l\'entrée'
            ))
            ->add('neuroImagerie', NeuroImagerieType::class, array(
                'label' => 'Neuro-imagerie'
            ))
            ->add('neuroPsychologie', NeuroPsychologieType::class, array(
                'label' => 'Neuro-psychologie'
            ))
            ->add('testEffort', TestEffortType::class, array(
                'label' => 'Définition des tests d\'effort'
            ))
            ->add('visite', VisiteType::class, array(
                'label' => 'Visite'
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
