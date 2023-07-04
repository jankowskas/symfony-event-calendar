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
            'title' => 'Mistrzostwa Tarczowe',
            'description' => 'Lorem Ipsum',
            'published' => 1,
            'startDate' => 'now',
            'endDate' => 'tomorrow',
            'anchors' => [
                'https://www.google.com',
                'https://www.google.com',
                'https://www.google.com',
            ],
            'organizer_reference' => 'organizer.mklstrzala',
            'association_reference' => 'association.wa',
            'contact_reference' => 'contact.pzlucz',
            'age_references' => [
                'age.adults'
            ],
            'round_references' => [
                'round.outdoor_target'
            ],
            'bow_type_references' => [
                'bow_type.olympic_recurve',
                'bow_type.compound',
                'bow_type.barebow'
            ],
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

            $event->setOrganizer($this->getReference($data['organizer_reference']));
            $event->setContact($this->getReference($data['contact_reference']));
            $event->setAssociation($this->getReference($data['association_reference']));

            foreach ($data['age_references'] as $reference) {
                $event->addAge($this->getReference($reference));
            }

            foreach ($data['round_references'] as $reference) {
                $event->addRound($this->getReference($reference));
            }

            foreach ($data['bow_type_references'] as $reference) {
                $event->addBowType($this->getReference($reference));
            }

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
            ContactFixtures::class,
            BowTypeFixtures::class,
            AgeFixtures::class,
            AssociationFixtures::class,
        ];
    }
}
