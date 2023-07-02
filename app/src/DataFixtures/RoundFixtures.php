<?php

namespace App\DataFixtures;

use App\Entity\Round;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoundFixtures extends Fixture
{
    public array $data = [
        [
            'name' => 'rounds.outdoor_target',
            'reference' => 'outdoor_target'
        ],
        [
            'name' => 'rounds.indoor_target',
            'reference' => 'indoor_target'
        ],
        [
            'name' => 'rounds.field',
            'reference' => 'field'
        ],
        [
            'name' => 'rounds.3d',
            'reference' => '3d'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new Round();
            $entity->setName($data['name']);
            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }
}
