<?php

namespace App\DataFixtures;

use App\Entity\BowType;
use App\Enum\BowTypesEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BowTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bowTypeEnums = BowTypesEnum::cases();

        foreach ($bowTypeEnums as $bowTypeEnum) {
            $bowType = new BowType();

            $bowType->setName($bowTypeEnum->value);

            $manager->persist($bowType);
            $this->setReference($bowTypeEnum->name, $bowType);
        }

        $manager->flush();
    }
}
