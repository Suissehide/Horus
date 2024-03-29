<?php

namespace App\Form;

use App\Constant\FormConstants;

use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = [];
        foreach (FormConstants::LABELS["FEUILLES"] as $feuille) {
            $choices[$feuille] = $feuille;
        }

        $builder
            ->add('protocoleNom', ChoiceType::class, [
                'label' => 'Protocoles',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => '',
                'choices' => $choices,
            ])
            ->add('date', DateType::class, array(
                'label' => 'Date de la visite',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'placeholder' => 'dd/mm/yyyy',
                    'class' => 'datepicker',
                    'autocomplete' => 'off',
                ],
                'html5' => false,
                'required' => false,
            ))
            ->add('protocole', ProtocoleType::class, array(
                'label' => 'Protocoles'
            ))

            ->add('save', SubmitType::class, ['label' => 'Sauvegarder']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
