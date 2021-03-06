<?php

namespace App\Form;

use App\Entity\BFR;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BFRType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille', IntegerType::class, array(
                'label' => 'Taille (en cm)',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 100,
                    'data-max' => 260,
                ),
                'required' => false,
            ))
            ->add('poids', IntegerType::class, array(
                'label' => 'Poids (en kg)',
                'attr' => array(
                    'unity' => 'kg',
                    'data-min' => 10,
                    'data-max' => 500,
                ),
                'required' => false,
            ))
            ->add('tourTaille', IntegerType::class, array(
                'label' => 'Tour de taille (en cm)',
                'attr' => array(
                    'unity' => 'cm',
                    'data-min' => 10,
                    'data-max' => 200,
                ),
                'required' => false,
            ))


            ->add('tensionArterielleSystoliqueJour', NumberType::class, array(
                'label' => 'Jour (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleDiastoliqueJour', NumberType::class, array(
                'label' => 'Jour (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false
            ))
            ->add('tensionArterielleSystoliqueNuit', NumberType::class, array(
                'label' => 'Nuit (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false,
            ))
            ->add('tensionArterielleDiastoliqueNuit', NumberType::class, array(
                'label' => 'Nuit (en mmHg)',
                'attr' => array(
                    'unity' => 'mmHg',
                    'data-min' => 1,
                    'data-max' => 200,
                ),
                'required' => false
            ))
            ->add('HVG', ChoiceType::class, array(
                'label' => 'HVG',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Non' => 'Non',
                    'Electrique' => 'Electrique',
                    'Echographique' => 'Echographique',
                ),
                'required' => false,
            ))


            ->add('cholesterolTotal', NumberType::class, array(
                'label' => 'Cholest??rol total (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('triglicerides', NumberType::class, array(
                'label' => 'Triglic??rides (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('HDLC', NumberType::class, array(
                'label' => 'HDL-C (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('LDLC', NumberType::class, array(
                'label' => 'LDL-C (en g/L)',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('scoreDUTCH', ChoiceType::class, array(
                'label' => 'Score de DUTCH',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    '0-2 HF peu probable' => '0-2 HF peu probable',
                    '3-5 HF possible' => '3-5 HF possible',
                    '6-8 HF probable' => '6-8 HF probable',
                    '>8 HF certaine' => '>8 HF certaine',
                ),
                'required' => false,
            ))


            ->add('tabagisme', ChoiceType::class, array(
                'label' => '??tat',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Non fumeur' => 'Non fumeur',
                    'Ancien fumeur' => 'Ancien fumeur',
                    'Fumeur' => 'Fumeur',
                ),
                'required' => false,
            ))
            ->add('dateArret', DateType::class, array(
                'label' => 'Date d\'arr??t',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'placeholder' => 'dd/mm/yyyy',
                    'class' => 'datepicker',
                    'autocomplete' => 'off'
                ],
                'html5' => false,
                'required' => false,
            ))
            ->add('nombrePaquetsAn', IntegerType::class, array(
                'label' => 'Nombres de paquets par an',
                'attr' => array(
                    'unity' => 'paquets/an',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))

            ->add('diabeteType', ChoiceType::class, array(
                'label' => 'Type',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    'Type 1' => 'Type 1',
                    'Type 2' => 'Type 2',
                ),
                'required' => false,
            ))
            ->add('diabeteDepuis', ChoiceType::class, array(
                'label' => 'Depuis',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices' => array(
                    '' => '',
                    '< 5 ans' => '< 5 ans',
                    '< 10 ans' => '< 10 ans',
                    '< 15 ans' => '< 15 ans',
                    '< 20 ans' => '< 20 ans',
                ),
                'required' => false,
            ))
            ->add('glycemieAjeun', NumberType::class, array(
                'label' => 'Glyc??mie aje??n',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('glycemiePostPrandiale', NumberType::class, array(
                'label' => 'Glyc??mie post prandiale',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('Hba1c', IntegerType::class, array(
                'label' => 'Hba1c',
                'attr' => array(
                    'unity' => '%',
                    'data-min' => 0,
                    'data-max' => 0,
                ),
                'required' => false,
            ))
            ->add('neuropathieClinique', ChoiceType::class, array(
                'label' => 'Neuropathie clinique (DN4)',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Normal' => 'Normal',
                    'Background (micro-an??vrysme ou oed??me)' => 'Background (micro-an??vrysme ou oed??me)',
                    'Isch??mique' => 'Isch??mique',
                    'Prolif??rative' => 'Prolif??rative',
                    'Laser' => 'Laser',
                    'Anormal sans pr??cision' => 'Anormal sans pr??cision',
                    'Non fait' => 'Non fait'
                ),
                'required' => false,
            ))
            ->add('fondOeil', ChoiceType::class, array(
                'label' => 'fond d\'oeil',
                'placeholder' => '',
                'choices' => array(
                    '' => '',
                    'Non Renseign??' => 'Non Renseign??',
                    'Normal' => 'Normal',
                    'Anormal' => 'Anormal'
                ),
                'required' => false,
            ))
            ->add('neuroesthesiometriePiedDroit', NumberType::class, array(
                'label' => 'Neuroesth??siom??trie pied droit (en volt)',
                'attr' => array(
                    'unity' => 'volt',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('neuroesthesiometriePiedGauche', NumberType::class, array(
                'label' => 'Neuroesth??siom??trie pied gauche (en volt)',
                'attr' => array(
                    'unity' => 'volt',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('transaminasesASAT', NumberType::class, array(
                'label' => 'Transaminases ASAT',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('transaminasesALAT', NumberType::class, array(
                'label' => 'Transaminases ALAT',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('gamma', NumberType::class, array(
                'label' => 'Gamma GT',
                'attr' => array(
                    'unity' => 'U/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('microAlbuminurie', NumberType::class, array(
                'label' => 'MicroAlbuminurie',
                'attr' => array(
                    'unity' => 'mg/24h',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('creatinine', NumberType::class, array(
                'label' => 'Cr??atinine',
                'attr' => array(
                    'unity' => 'umol/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('debitFiltrationGlomerulaire', NumberType::class, array(
                'label' => 'D??bit de filtration glomerulaire CK-EPI',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('proteinurie', NumberType::class, array(
                'label' => 'Prot??inurie',
                'attr' => array(
                    'unity' => 'g/l',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))


            ->add('fibrinogene', NumberType::class, array(
                'label' => 'Fibrinog??ne',
                'attr' => array(
                    'unity' => 'g/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('CRP', NumberType::class, array(
                'label' => 'CRP',
                'attr' => array(
                    'unity' => 'mmol/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('hemoglobine', NumberType::class, array(
                'label' => 'H??moglobine',
                'attr' => array(
                    'unity' => 'g/dL',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('UGM', NumberType::class, array(
                'label' => 'UGM',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('plaquettes', NumberType::class, array(
                'label' => 'Plaquettes',
                'attr' => array(
                    'unity' => '10^9/L',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            ->add('TSH', NumberType::class, array(
                'label' => 'TSH',
                'attr' => array(
                    'unity' => '',
                    'data-min' => 0,
                    'data-max' => 0,
                    'step' => 0.01,
                ),
                'required' => false,
            ))
            
            ->add('activitePhysique', ChoiceType::class, array(
                'label' => 'Activit?? physique',
                'choices' => array(
                    'Aucune' => 'Aucune',
                    '1 ?? 150 min/semaine d\'activit?? mod??r??e ou 1 ?? 75 min/semaine d\'activit?? vigoureuse' => '1 ?? 150 min/semaine d\'activit?? mod??r??e ou 1 ?? 75 min/semaine d\'activit?? vigoureuse',
                    '> 150 min/semaine d\'activit?? mod??r??e ou > 75 min/semaine d\'activit?? vigoureuse' => '> 150 min/semaine d\'activit?? mod??r??e ou > 75 min/semaine d\'activit?? vigoureuse'
                ),
                'required' => false,
            ))

            ->add('alimentation', ChoiceType::class, array(
                'label' => 'Alimentation',
                'multiple' => true,
                'expanded' => true,
                'choices' => array(
                    '??? 4 ou 5 fruits et l??gumes/jours' => '??? 4 ou 5 fruits et l??gumes/jours',
                    '??? 2 portions de poisson/semaine' => '???  2 portions de poisson/semaine',
                    '??? 3 portions de c??r??ales ou fibres/semaine' => '??? 3 portions de c??r??ales ou fibres/semaine',
                    '< 15g de sel/jour' => '< 15g de sel/jour',
                    '??? 1 boisson sucr??e/semaine' => '??? 1 boisson sucr??e/semaine',
                ),
                'required' => false,
            ))

            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BFR::class,
        ]);
    }
}
