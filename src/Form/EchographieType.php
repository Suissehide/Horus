<?php

namespace App\Form;

use App\Entity\Echographie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EchographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reposIVA', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('reposCirconflexe', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('reposCoronaireDroite', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))

            ->add('effortIVA', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('effortCirconflexe', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))
            ->add('effortCoronaireDroite', ChoiceType::class, array(
                'label' => false,
                'placeholder' => false,
                'choices' => array(
                    'Normal' => 'Normal',
                    'Hypokinésie' => 'Hypokinésie',
                    'Akinésie' => 'Akinésie',
                ),
                'required' => false,
            ))

            ->add('nbSegmentIVA', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('nbSegmentCirconflexe', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('nbSegmentCoronaireDroite', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('fractionEjection', IntegerType::class, array(
                'label' => 'Fraction d\'éjection (en %)',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Echographie::class,
        ]);
    }
}
