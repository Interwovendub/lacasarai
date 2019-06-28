<?php

namespace App\Form;

use App\Entity\Reservering;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReserveringType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('AanmaakDatum')
            ->add('AankomstDatum')
            ->add('VertrekDatum')
            ->add('Kinderen')
            ->add('Volwassenen')
            ->add('BetaalNummer')
            ->add('AccountNummer')
            ->add('Reserveringsnummer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservering::class,
        ]);
    }
}
