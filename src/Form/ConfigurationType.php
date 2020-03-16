<?php

namespace App\Form;

use App\DataTransfer\ConfigurationDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tcpPort', IntegerType::class)
            ->add('udpPort', IntegerType::class)
            ->add('registerToLobby', BooleanType::class)
            ->add(
                'maxConnections',
                CustomRangeType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ]
            )
            ->add('lanDiscovery', BooleanType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ConfigurationDTO::class,
            ]
        );
    }
}
