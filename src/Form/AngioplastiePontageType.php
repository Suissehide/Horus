<?php

namespace App\Form;

use App\Entity\AngioplastiePontage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AngioplastiePontageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('segment1', CheckboxType::class, array(
                'label' => '1er segment',
                'required' => false
            ))
            ->add('segment2', CheckboxType::class, array(
                'label' => '2ème segment',
                'required' => false
            ))
            ->add('segment3', CheckboxType::class, array(
                'label' => '3ème segment',
                'required' => false
            ))

            ->add('troncCommun', CheckboxType::class, array(
                'label' => 'Tronc commun',
                'required' => false
            ))
            ->add('diagonal', CheckboxType::class, array(
                'label' => 'Diagonal',
                'required' => false
            ))
            ->add('ivaProximal', CheckboxType::class, array(
                'label' => 'Iva proximal',
                'required' => false
            ))
            ->add('ivaMoyenne', CheckboxType::class, array(
                'label' => 'Iva moyenne',
                'required' => false
            ))
            ->add('circonflexeProximale', CheckboxType::class, array(
                'label' => 'Circonflexe proximale',
                'required' => false
            ))
            ->add('postrolLateral', CheckboxType::class, array(
                'label' => 'Postrol latéral',
                'required' => false
            ))

            ->add('pontSaphenesGauche', CheckboxType::class, array(
                'label' => 'Pont saphenes gauche',
                'required' => false
            ))
            ->add('pontSaphenesDroit', CheckboxType::class, array(
                'label' => 'Pont saphenes droit',
                'required' => false
            ))
            ->add('pontMammaire', CheckboxType::class, array(
                'label' => 'Pont mammaire',
                'required' => false
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AngioplastiePontage::class,
        ]);
    }
}
