<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Enum\DivisionEnum;
use App\Enum\EventCategoryEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    private array $data = [
        [
          'title' => 'Mistrzostwa Strzelania do kupy siana',
          'description' => 'Lorem ipsum',
          'published' => 1,
          'startDate' => 'now',
          'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $i => $data) {
            $event = new Event();
            $event->setTitle($data['title']);
            $event->setDescription($data['description']);
            $event->setPublished($data['published']);
            $event->setStartDate(new \DateTimeImmutable($data['startDate']));
            if (isset($data['endDate'])) {
                $event->setEndDate(new \DateTimeImmutable($data['endDate']));
            }
            $event->setOrganizer($this->getReference('organizer'.rand(0, 3)));
            $event->setDivisions([DivisionEnum::getChoices()]);
            $event->setEventCategories(EventCategoryEnum::getChoices());
            $event->addAnchor($this->getReference('anchor0'));
            $event->addAnchor($this->getReference('anchor1'));
            $event->addAnchor($this->getReference('anchor2'));

            $manager->persist($event);

            $this->setReference('event'.$i, $event);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AnchorFixtures::class,
            AnchorFixtures::class,
        ];
    }
}
