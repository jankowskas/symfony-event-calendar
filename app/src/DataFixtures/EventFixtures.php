<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Enum\AssociationsEnum;
use App\Enum\BowTypesEnum;
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
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ],
            'association_reference' => null,
            'age_references' => [
                null
            ],
            'round_references' => [
                null
            ],
            'bow_type_references' => [
                null
            ],
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
        ],
        [
            'title' => 'Mistrzostwa Strzelania do kupy siana',
            'description' => 'Lorem ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ]
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
            $event->setAnchors(json_encode($data['anchors']));

            if (isset($data['endDate'])) {
                $event->setEndDate(new \DateTimeImmutable($data['endDate']));
            }

            $event->setOrganizer($this->getReference('organizer'));
            $event->setContact($this->getReference('contact' . $i));
            $event->setAssociations();
            $event->addDivision();
            $event->addBowClass();
            $event->addBowType();
            $event->addRound();

            $manager->persist($event);

            $this->setReference('event'.$i, $event);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            RoundFixtures::class,
            OrganizerFixtures::class,
        ];
    }
}
