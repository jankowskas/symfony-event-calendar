<?php

namespace App\DataFixtures;

use App\Entity\BowClass;
use App\Enum\BowClassesEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BowClassFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bowClassesEnums = BowClassesEnum::cases();

        foreach ($bowClassesEnums as $bowClassEnums) {
            $bowClass = new BowClass();

            $bowClass->setName($bowClassEnums->value);

            $manager->persist($bowClass);
            $this->setReference($bowClassEnums->name, $bowClass);
        }

        $manager->flush();
    }
}
