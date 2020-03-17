<?php

namespace App\Form;

use App\DataTransfer\SessionDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'hourOfDay',
                CustomRangeType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 23,
                    ],
                ]
            )
            ->add(
                'dayOfWeekend',
                BooleanType::class,
                [
                    'choices' => [
                        'Friday'   => 1,
                        'Saturday' => 2,
                        'Sunday'   => 3,
                    ],
                ]
            )
            ->add(
                'timeMultiplier',
                CustomRangeType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 24,
                    ],
                ]
            )
            ->add(
                'sessionType',
                BooleanType::class,
                [
                    'choices' => [
                        'Practice'      => 'P',
                        'Qualification' => 'Q',
                        'Race'          => 'R',
                    ],
                ]
            )
            ->add(
                'sessionDurationMinutes',
                IntegerType::class,
                [
                    'attr' => ['min' => 1],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => SessionDTO::class,
            ]
        );
    }
}
