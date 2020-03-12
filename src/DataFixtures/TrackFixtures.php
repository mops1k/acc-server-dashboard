<?php

namespace App\DataFixtures;

use App\Entity\Track;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class TrackFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tracks = Yaml::parseFile(__DIR__.DIRECTORY_SEPARATOR.'Data'.DIRECTORY_SEPARATOR.'Track.yaml');

        foreach ($tracks as $track) {
            $entity = new Track();
            $entity
                ->setTitle($track['title'])
                ->setSlug($track['slug']);

            $manager->persist($entity);
        }

        $manager->flush();
    }
}
