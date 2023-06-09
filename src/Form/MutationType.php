<?php

namespace App\Form;

use App\Constant\FormConstants;

use App\Entity\Mutation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MutationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gene', ChoiceType::class, array(
                'label' => 'Gène',
                'placeholder' => false,
                'choices' => FormConstants::LABELS['GENES'],
                'required' => false,
            ))
            ->add('nomenclature', TextType::class, array(
                'label' => 'Nomenclature',
                'required' => false,
            ))
            ->add('vaf', NumberType::class, array(
                'label' => 'VAF',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => '0.1'
                ),
                'required' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mutation::class,
        ]);
    }
}
