<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    private array $data = [
        [
            'name' => 'Klawik',
            'email' => 'klawik@warmia.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.klawik',
        ],
        [
            'name' => 'Grubryś',
            'email' => 'grubrys@fakearcher.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.grubrys',
        ],
        [
            'name' => 'Miłek',
            'email' => 'miek@mkl.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.milek',
        ],
        [
            'name' => 'Arek',
            'email' => 'arek@rokis.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.arek',
        ],
        [
            'name' => 'PZŁUCZ',
            'email' => 'kontakt@archery.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.pzlucz',
        ],
        [
            'name' => 'PFAA',
            'email' => 'kontakt@pfaa.pl',
            'phone' => '123 321 123',
            'website' => 'https://www.google.com',
            'reference' => 'contact.pfaa',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data as $data) {
            $entity = new Contact();

            $entity->setName($data['name'] ?? null);
            $entity->setEmail($data['email'] ?? null);
            $entity->setPhone($data['phone'] ?? null);
            $entity->setWebsite($data['website'] ?? null);

            $manager->persist($entity);
            $this->setReference($data['reference'], $entity);
        }

        $manager->flush();
    }

}
