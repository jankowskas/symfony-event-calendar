<?php

namespace App\DataFixtures;

use App\Entity\BowType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BowTypeFixtures extends Fixture
{
    public array $data = [
        [
            'name' => 'bow_types.compound',
            'reference' => 'compound'
        ],
        [
            'name' => 'bow_types.barebow',
            'reference' => 'barebow'
        ],
        [
            'name' => 'bow_types.olympic_recurve',
            'reference' => 'olympic_recurve'
        ],
        [
            'name' => 'bow_types.traditional',
            'reference' => 'traditional'
        ],
        [
            'name' => 'bow_types.longbow',
            'reference' => 'longbow'
        ],
        [
            'name' => 'bow_types.historical',
            'reference' => 'historical'
        ],
        [
            'name' => 'bow_types.horsebow',
            'reference' => 'horsebow'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new BowType();
            $entity->setName($data['name']);
            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }
}
