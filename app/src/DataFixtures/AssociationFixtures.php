<?php

namespace App\DataFixtures;

use App\Entity\Association;
use App\Enum\AssociationsEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AssociationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $associationsEnum = AssociationsEnum::cases();

        foreach ($associationsEnum as $associationEnum) {
            $association = new Association();

            $association->setName($associationEnum->value);

            $manager->persist($association);
            $this->setReference($associationEnum->name, $association);
        }

        $manager->flush();
    }
}
