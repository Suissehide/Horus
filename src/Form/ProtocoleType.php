<?php

namespace App\Form;

use App\Entity\Protocole;

use App\Form\MedicamentsEntreeType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtocoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fiches')

            ->add('medicamentsEntree', MedicamentsEntreeType::class, array(
                'label' => 'Médicament à l\'entrée'
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
