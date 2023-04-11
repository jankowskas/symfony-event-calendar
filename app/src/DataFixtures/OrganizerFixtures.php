<?php

namespace App\DataFixtures;

use App\Entity\Organizer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrganizerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $organizer = new Organizer();
        $organizer->setName('Warmia Archers');

        $manager->persist($organizer);
        $manager->flush();
    }
}
