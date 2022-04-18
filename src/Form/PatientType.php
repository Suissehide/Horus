<?php

namespace App\Form;

use App\Entity\Patient;

use App\Form\GeneralType;
use App\Form\FacteurType;
use App\Form\AntecedentCardiovasculaireType;
use App\Form\InformationType;
use App\Form\ProtocoleType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('general', GeneralType::class, array(
                'label' => 'Général'
            ))

            ->add('antecedentCardiovasculaire', AntecedentCardiovasculaireType::class, array(
                'label' => 'Antécédent Cardiocasculaire'
            ))

            ->add('information', InformationType::class, array(
                'label' => 'Information'
            ))

            ->add('facteur', FacteurType::class, array(
                'label' => 'Facteur'
            ))

            ->add('protocole', ProtocoleType::class, array(
                'label' => 'Protocole'
            ))

            ->add('create', SubmitType::class, array('label' => 'Créer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
