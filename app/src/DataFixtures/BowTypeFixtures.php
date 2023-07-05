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
            'reference' => 'bow_types.compound'
        ],
        [
            'name' => 'bow_types.barebow',
            'reference' => 'bow_types.barebow'
        ],
        [
            'name' => 'bow_types.olympic_recurve',
            'reference' => 'bow_types.olympic_recurve'
        ],
        [
            'name' => 'bow_types.traditional',
            'reference' => 'bow_types.traditional'
        ],
        [
            'name' => 'bow_types.longbow',
            'reference' => 'bow_types.longbow'
        ],
        [
            'name' => 'bow_types.historical',
            'reference' => 'bow_types.historical'
        ],
        [
            'name' => 'bow_types.horsebow',
            'reference' => 'bow_types.horsebow'
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
