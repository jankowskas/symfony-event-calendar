<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    private array $data = [
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
        [
            'name' => 'Andrzej Wowija',
            'email' => 'kontakt@wowija.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $i => $data) {
            $contact = new Contact();

            $contact->setName($data['name'] ?? null);
            $contact->setEmail($data['email'] ?? null);
            $contact->setPhone($data['phone'] ?? null);
            $contact->setWebsite($data['website'] ?? null);

            $manager->persist($contact);
            $this->setReference('contact'.$i, $contact);
        }

        $manager->flush();
    }
}