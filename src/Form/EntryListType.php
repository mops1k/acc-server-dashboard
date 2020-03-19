<?php

namespace App\Form;

use App\DataTransfer\EntryListDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntryListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('forceEntryList', BooleanType::class)
            ->add(
                'entries',
                CollectionType::class,
                [
                    'entry_type'   => EntryType::class,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'entry_options' => [
                        'label' => false,
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => EntryListDTO::class,
            ]
        );
    }
}
