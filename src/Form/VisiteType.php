<?php

namespace App\Form;

use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motifs', ChoiceType::class, array(
                'label' => 'Motifs médical',
                'placeholder' => '',
                'expanded' => false,
				'multiple' => true,
                'choices' => array(
                    'AIT' => 'AIT',
                    'Artériopathie des membres inférieurs' => 'Artériopathie des membres inférieurs',
                    'AVC hémorragique' => 'AVC hémorragique',
                    'AVC ischémique' => 'AVC ischémique',
                    'Coronaropathie stable' => 'Coronaropathie stable',
                    'Insuffisance cardiaque' => 'Insuffisance cardiaque',
                    'Prévention primaire' => 'Prévention primaire',
                    'Prévention secondaire' => 'Prévention secondaire',
                    'SCA avec sous-décalage ST, Troponine (-)' => 'SCA avec sous-décalage ST, Troponine (-)',
                    'SCA avec sus-décalage ST, Troponine (+)' => 'SCA avec sus-décalage ST, Troponine (+)',
                    'SCA sans élévation de troponine' => 'SCA sans élévation de troponine',
                    'Sténose artère rénale' => 'Sténose artère rénale',
                    'Trouble du rythme et/ou de la conduction cardiaque' => 'Trouble du rythme et/ou de la conduction cardiaque'
                ),
                'required' => false
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
