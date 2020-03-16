<?php

namespace App\Form;

use App\DataTransfer\EventRulesDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventRulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'qualifyStandingType',
                BooleanType::class,
                [
                    'label_attr' => [
                        'data-toggle'    => 'tooltip',
                        'data-placement' => 'bottom',
                        'title'          => 'fastest lap or average lap (running Endurance
mode for multiple Q sessions). Use fastest lap, averaging
Qualy is not yet officially supported.',
                    ],
                    'choices'    => [
                        'fastest lap' => 1,
                        'average lap' => 2,
                    ],
                ]
            )
            ->add('pitWindowLengthSec', IntegerType::class)
            ->add('driverStintTimeSec', IntegerType::class)
            ->add('mandatoryPitstopCount', IntegerType::class)
            ->add('maxTotalDrivingTime', IntegerType::class)
            ->add('maxDriversCount', IntegerType::class)
            ->add('isRefuellingAllowedInRace', BooleanType::class)
            ->add('isRefuellingTimeFixed', BooleanType::class)
            ->add('isMandatoryPitstopRefuellingRequired', BooleanType::class)
            ->add('isMandatoryPitstopTyreChangeRequired', BooleanType::class)
            ->add('isMandatoryPitstopSwapDriverRequired', BooleanType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => EventRulesDTO::class,
            ]
        );
    }
}
