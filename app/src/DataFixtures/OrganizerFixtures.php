<?php

namespace App\DataFixtures;

use App\Entity\Organizer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrganizerFixtures extends Fixture implements DependentFixtureInterface
{
    private array $data = [
        [
            'name' => 'Warmia Archers',
            'contact_reference' => 'contact.klawik',
            'reference' => 'organizer.klawik'
        ],
        [
            'name' => 'FakeArcher',
            'contact_reference' => 'contact.grubrys',
            'reference' => 'organizer.fakearcher'
        ],
        [
            'name' => 'MKŁ Strzała',
            'contact_reference' => 'contact.milek',
            'reference' => 'organizer.mklstrzala'
        ],
        [
            'name' =>  'ROKIS Radzymin',
            'contact_reference' => 'contact.arek',
            'reference' => 'organizer.rokisradzymin'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new Organizer();
            $entity->setName($data['name']);

            if (!is_null($this->getReference($data['contact_reference']))) {
                $entity->setContact($this->getReference($data['contact_reference']));
            }

            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ContactFixtures::class,
        ];
    }
}
