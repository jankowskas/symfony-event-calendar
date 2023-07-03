<?php

namespace App\DataFixtures;

use App\Entity\Organizer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrganizerFixtures extends Fixture
{
    private array $data = [
        [
            'name' => 'Warmia Archers',
            'contact_reference' => null,
        ],
        [
            'name' => 'Denkar Promise',
            'contact_reference' => null,
        ],
        [
            'name' => 'NKL Strzała',
            'contact_reference' => null,
        ],
        [
            'name' => 'Burmia Archers',
            'contact_reference' => null,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $i => $data) {
            $organizer = new Organizer();
            $organizer->setName($data['name']);

            if (!is_null($this->getReference($data['contact_reference']))) {
                $organizer->setContact($this->getReference($data['contact_reference']));
            }

            $manager->persist($organizer);
            $this->setReference('organizer'.$i, $organizer);
        }

        $manager->flush();
    }
}
