<?php

namespace App\DataFixtures;

use App\Entity\Anchor;
use App\Entity\Organizer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnchorFixtures extends Fixture
{
    private array $data = [
        [
            'url' => 'https://google.com',
            'description' => 'Google',
        ],
        [
            'url' => 'https://google.com',
            'description' => 'Google',
        ],
        [
            'url' => 'https://google.com',
            'description' => 'Google',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $i => $data) {
            $anchor = new Anchor();

            $anchor->setUrl($data['url']);
            $anchor->setDescription($data['description']);

            $manager->persist($anchor);
            $this->setReference('anchor' . $i, $anchor);
        }

        $manager->flush();
    }
}
