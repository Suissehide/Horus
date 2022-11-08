<?php

namespace App\Form;

use App\Entity\Catheterisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CatheterisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('segment1', ChoiceType::class, array(
                'label' => '1er segment',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('segment2', ChoiceType::class, array(
                'label' => '2ème segment',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('segment3', ChoiceType::class, array(
                'label' => '3ème segment',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('troncCommun', ChoiceType::class, array(
                'label' => 'Tronc commun',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('diagonal', ChoiceType::class, array(
                'label' => 'Diagonal',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('ivaProximal', ChoiceType::class, array(
                'label' => 'Iva proximal',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('ivaMoyenne', ChoiceType::class, array(
                'label' => 'Iva moyenne',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('circonflexeProximale', ChoiceType::class, array(
                'label' => 'Circonflexe proximale',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('postrolLateral', ChoiceType::class, array(
                'label' => 'Postrol latéral',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('pontSaphenesGauche', ChoiceType::class, array(
                'label' => 'Pont saphenes gauche',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('pontSaphenesDroit', ChoiceType::class, array(
                'label' => 'Pont saphenes droit',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))
            ->add('pontMammaire', ChoiceType::class, array(
                'label' => 'Pont mammaire',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    '0%' => '0%',
                    '10%-30%' => '10%-30%',
                    '31-50%' => '31-50%',
                    '51-70%' => '51-70%',
                    '71-90%' => '71-90%',
                    '+ de 90%' => '+ de 90%'
                ),
                'required' => false,
            ))

            ->add('FEVentriculographie', IntegerType::class, array(
                'label' => 'FE ventriculographie',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('FEIsotopique', IntegerType::class, array(
                'label' => 'FE isotopique',
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
            'data_class' => Catheterisation::class,
        ]);
    }
}
