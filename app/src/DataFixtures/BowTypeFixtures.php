<?php

namespace App\DataFixtures;

use App\Entity\BowType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BowTypeFixtures extends Fixture
{
    public array $data = [
        [
            'name' => 'bow_type.compound',
            'reference' => 'bow_type.compound'
        ],
        [
            'name' => 'bow_type.barebow',
            'reference' => 'bow_type.barebow'
        ],
        [
            'name' => 'bow_type.olympic_recurve',
            'reference' => 'bow_type.olympic_recurve'
        ],
        [
            'name' => 'bow_type.traditional',
            'reference' => 'bow_type.traditional'
        ],
        [
            'name' => 'bow_type.longbow',
            'reference' => 'bow_type.longbow'
        ],
        [
            'name' => 'bow_type.historical',
            'reference' => 'bow_type.historical'
        ],
        [
            'name' => 'bow_type.horsebow',
            'reference' => 'bow_type.horsebow'
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
