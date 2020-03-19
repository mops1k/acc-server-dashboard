<?php

namespace App\Form;

use App\DataTransfer\DriverDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('shortName')
            ->add(
                'driverCategory',
                BooleanType::class,
                [
                    'choices' => [
                        'Overall'  => 0,
                        'ProAm'    => 1,
                        'Pro'      => 2,
                        'Am'       => 3,
                        'National' => 4,
                    ],
                ]
            )
            ->add('playerID', TextType::class, ['label' => 'Player steamID64']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => DriverDTO::class,
            ]
        );
    }
}
