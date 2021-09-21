<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => "Email",
                'attr' => array(
                    'placeholder' => 'Email'
                ),
            ))
            ->add('nom', TextType::class, array(
                'label' => "Nom",
                'attr' => array(
                    'placeholder' => 'Nom'
                ),
                'required' => false,
            ))
            ->add('prenom', TextType::class, array(
                'label' => "Prénom",
                'attr' => array(
                    'placeholder' => 'Prénom'
                ),
                'required' => false,
            ))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer'));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
