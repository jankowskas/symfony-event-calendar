<?php

namespace App\DataFixtures;

use App\Entity\Organizer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrganizerFixtures extends Fixture
{
    private array $data = [
        [
            'name' => 'Burmia Archers'
        ],
        [
            'name' => 'Denkar Promise'
        ],
        [
            'name' => 'NKL Strzała'
        ],
        [
            'name' => 'Burmia Archers'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $i => $data) {
            $organizer = new Organizer();
            $organizer->setName($data['name']);
            $manager->persist($organizer);
            $this->setReference('organizer' . $i, $organizer);
        }

        $manager->flush();
    }
}
