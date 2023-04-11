<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $event = new Event();
        $event->setTitle('Mistrzostwa Nibylandii');

        $manager->persist($event);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [EventFixtures::class];
    }
}
