<?php

namespace App\DataFixtures;

use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AssociationFixtures extends Fixture
{
    public array $data = [
        [
            'name' => 'WA',
            'reference' => 'association.wa'
        ],
        [
            'name' => 'IFAA',
            'reference' => 'association.ifaa'
        ],
        [
            'name' => 'none',
            'reference' => 'association.none'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new Association();
            $entity->setName($data['name']);
            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }
}
