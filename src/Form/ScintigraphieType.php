<?php

namespace App\Form;

use App\Entity\Scintigraphie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScintigraphieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reposDebitIVA')
            ->add('reposDebitCX')
            ->add('reposDebitCD')
            ->add('reposDebitTotal')
            ->add('regadenosonDebitIVA')
            ->add('regadenosonDebitCX')
            ->add('regadenosonDebitCD')
            ->add('regadenosonDebitTotal')
            ->add('reserveIVA')
            ->add('reserveCX')
            ->add('reserveCD')
            ->add('reserveTotal')
            ->add('reposAnalyseVisuelleIVA')
            ->add('reposAnalyseVisuelleCX')
            ->add('reposAnalyseVisuelleCD')
            ->add('regadenosonAnalyseVisuelleIVA')
            ->add('regadenosonAnalyseVisuelleCX')
            ->add('regadenosonAnalyseVisuelleCD')
            ->add('fractionEjection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scintigraphie::class,
        ]);
    }
}
