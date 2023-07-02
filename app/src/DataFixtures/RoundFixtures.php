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
            'reference' => 'Tarczowe'
        ],
        [
            'name' => 'rounds.indoor_target',
            'reference' => 'Halowe'
        ],
        [
            'name' => 'rounds.field',
            'reference' => 'Field'
        ],
        [
            'name' => 'rounds.3d',
            'reference' => '3D'
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
