<?php

namespace App\DataFixtures;

use App\Entity\Division;
use App\Enum\DivisionsEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DivisionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $divisionsEnum = DivisionsEnum::cases();

        foreach ($divisionsEnum as $divisionEnum) {
            $division = new Division();

            $division->setName($divisionEnum->value);

            $manager->persist($division);
            $this->setReference($divisionEnum->name, $division);
        }

        $manager->flush();
    }
}
