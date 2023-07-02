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
            'reference' => 'associations.wa'
        ],
        [
            'name' => 'IFAA',
            'reference' => 'associations.ifaa'
        ],
        [
            'name' => 'none',
            'reference' => 'associations.none'
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
