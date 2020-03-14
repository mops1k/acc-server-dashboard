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
                'label_attr' => [
                    'data-toggle'=>"tooltip",
                    'data-placement'=>"bottom",
                    'title'=>"Set’s the maximum % of SC that can be used. In
case a client has a higher SC set than allowed by
the server, he will only run what is allowed (25%
in this example). Obviously setting this property to
0 removes all SC, including mouse and keyboard 
users.
The Stability Control is an artificial driving aid
that allows the car to act out of the physics
boundaries, and highly recommended to overcome
input methods like Keyboards, Gamepads and
Mouse steering. However, there is a built-in effect
that makes the SC performance inferior, so in
theory using (and relying) on SC is already more
than enough penalty, and the way to improve
performance is to practice driving without.
Default: 100"
                ],
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
