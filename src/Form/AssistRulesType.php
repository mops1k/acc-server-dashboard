<?php

namespace App\Form;

use App\DataTransfer\AssistRulesDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssistRulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stabilityControlLevelMax', NumberType::class, [
                'label' => 'Maximum stability control level in %',
                'attr' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 5
                ],
            ])
            ->add('disableAutosteer', BooleanType::class)
            ->add('disableAutoLights', BooleanType::class)
            ->add('disableAutoWiper', BooleanType::class)
            ->add('disableAutoEngineStart', BooleanType::class)
            ->add('disableAutoPitLimiter', BooleanType::class)
            ->add('disableAutoGear', BooleanType::class)
            ->add('disableAutoClutch', BooleanType::class)
            ->add('disableIdealLine', BooleanType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AssistRulesDTO::class,
        ]);
    }
}
