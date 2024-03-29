<?php

namespace App\DataFixtures;

use App\Entity\Age;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgeFixtures extends Fixture
{
    public array $data = [
        [
            'name' => 'ages.masters',
            'reference' => 'age.masters'
        ],
        [
            'name' => 'ages.adults',
            'reference' => 'age.adults'
        ],
        [
            'name' => 'ages.children',
            'reference' => 'age.children'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new Age();
            $entity->setName($data['name']);
            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }
}
