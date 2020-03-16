<?php

namespace App\Form;

use App\DataTransfer\SettingsDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serverName')
            ->add('adminPassword', PasswordType::class, [
                'always_empty' => false,
            ])
            ->add('password', null, ['label' => 'Server password'])
            ->add('spectatorPassword')
            ->add('trackMedalsRequirement', CustomRangeType::class, [
                'label' => 'Minimum track medals',
                'attr' => [
                    'min' => 0,
                    'max' => 3,
                ]
            ])
            ->add('safetyRatingRequirement', CustomRangeType::class, [
                'label' => 'Minimum safety rating',
                'attr' => [
                    'min' => -1,
                    'max' => 99
                ]
            ])
            ->add('racecraftRatingRequirement', CustomRangeType::class , [
                'label' => 'Minimum RC rating',
                'attr' => [
                    'min' => -1,
                    'max' => 99
                ]
            ])
            ->add('maxCarSlots', CustomRangeType::class, [
                'label' => 'Maximum car slots',
                'attr' => [
                    'min' => 0,
                    'max' => 50
                ]
            ])
            ->add('dumpLeaderboards', BooleanType::class, ['label' => 'Save race results'])
            ->add('isRaceLocked', BooleanType::class, ['label' => 'Race locked'])
            ->add('randomizeTrackWhenEmpty', BooleanType::class)
            ->add('centralEntryListPath')
            ->add('allowAutoDQ', BooleanType::class, [
                'label' => 'Allow automatic disqualification'
            ])
            ->add('shortFormationLap', BooleanType::class)
            ->add('dumpEntryList', BooleanType::class)
            ->add('formationLapType', BooleanType::class, [
                'choices' => [
                    'Old limiter' => 0,
                    'Free' => 1,
                    'Default' => 3,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SettingsDTO::class,
        ]);
    }
}
