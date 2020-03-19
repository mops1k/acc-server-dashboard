<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class CarFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cars = Yaml::parseFile(__DIR__.DIRECTORY_SEPARATOR.'Data'.DIRECTORY_SEPARATOR.'Car.yaml');

        foreach ($cars as $car) {
            $entity = new Car();
            $entity
                ->setName($car['name'])
                ->setGameId($car['gameId']);

            $manager->persist($entity);
        }

        $manager->flush();
    }
}
