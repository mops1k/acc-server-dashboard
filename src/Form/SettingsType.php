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
            ->add('adminPassword', PasswordType::class)
            ->add('trackMedalsRequirement', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 3,
                ]
            ])
            ->add('safetyRatingRequirement', NumberType::class, [
                'attr' => [
                    'min' => -1,
                    'max' => 99
                ]
            ])
            ->add('racecraftRatingRequirement', NumberType::class , [
                'attr' => [
                    'min' => -1,
                    'max' => 99
                ]
            ])
            ->add('password')
            ->add('spectatorPassword')
            ->add('maxCarSlots', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 50
                ]
            ])
            ->add('dumpLeaderboards', BooleanType::class)
            ->add('isRaceLocked', BooleanType::class)
            ->add('randomizeTrackWhenEmpty', BooleanType::class)
            ->add('centralEntryListPath')
            ->add('allowAutoDQ', BooleanType::class)
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
