<?php

namespace App\DataFixtures;

use App\Entity\Round;
use App\Enum\RoundsEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoundFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $roundsEnum = RoundsEnum::cases();

        foreach ($roundsEnum as $roundEnum) {
            $round = new Round();

            $round->setName($roundEnum->value);

            $manager->persist($round);
            $this->setReference($roundEnum->name, $round);
        }

        $manager->flush();
    }
}
