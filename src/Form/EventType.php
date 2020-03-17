<?php

namespace App\Form;

use App\DataTransfer\EventDTO;
use App\Repository\TrackRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * @var TrackRepository
     */
    protected $trackRepository;

    /**
     * EventType constructor.
     *
     * @param TrackRepository $trackRepository
     */
    public function __construct(TrackRepository $trackRepository)
    {
        $this->trackRepository = $trackRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('track', ChoiceType::class, [
                'choice_loader' => new CallbackChoiceLoader(
                    function () {
                        $tracks = $this->trackRepository->findAll();
                        $result = [];
                        foreach ($tracks as $track) {
                            $result[$track->getTitle()] = $track->getSlug();
                        }

                        return $result;
                    }),
            ])
            ->add('preRaceWaitingTimeSeconds')
            ->add('sessionOverTimeSeconds')
            ->add('ambientTemp')
            ->add('trackTemp')
            ->add('cloudLevel')
            ->add('rain', CustomRangeType::class, [
                'attr' => [
                    'min' => 0.0,
                    'max' => 1.0,
                    'step' => 0.1,
                ]
            ])
            ->add('weatherRandomness', CustomRangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 7,
                ]
            ])
            ->add('postQualySeconds')
            ->add('postRaceSeconds')
            ->add('metaData')
            ->add('sessions', CollectionType::class, [
                'entry_type' => SessionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EventDTO::class,
        ]);
    }
}
