<?php

namespace App\Form;

use App\DataTransfer\EntryDTO;
use App\Repository\CarRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntryType extends AbstractType
{
    /**
     * @var CarRepository
     */
    protected CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'drivers',
                CollectionType::class,
                [
                    'entry_type'     => DriverType::class,
                    'allow_add'      => true,
                    'allow_delete'   => true,
                    'prototype_name' => '__drivers_name__',
                    'entry_options'  => [
                        'label' => false,
                    ],
                ]
            )
            ->add('raceNumber')
            ->add(
                'forcedCarModel',
                ChoiceType::class,
                [
                    'choice_loader' => new CallbackChoiceLoader(
                        function () {
                            $result = ['none' => -1];
                            $cars   = $this->carRepository->findBy([], ['name' => Criteria::ASC]);
                            foreach ($cars as $car) {
                                $result[$car->getName()] = $car->getGameId();
                            }

                            return $result;
                        }
                    ),
                ]
            )
            ->add('overrideDriverInfo', BooleanType::class)
            ->add('customCar')
            ->add('overrideCarModelForCustomCar', BooleanType::class)
            ->add('isServerAdmin', BooleanType::class)
            ->add('defaultGridPosition')
            ->add(
                'ballastKg',
                CustomRangeType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ]
            )
            ->add(
                'restrictor',
                CustomRangeType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => EntryDTO::class,
            ]
        );
    }
}
