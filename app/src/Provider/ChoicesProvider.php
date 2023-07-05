<?php

namespace App\Provider;

use App\Repository\AgeRepository;
use App\Repository\AssociationRepository;
use App\Repository\BowTypeRepository;
use App\Repository\OrganizerRepository;
use App\Repository\RoundRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ChoicesProvider
{
    private AssociationRepository $associationRepository;
    private AgeRepository $ageRepository;
    private BowTypeRepository $bowTypeRepository;
    private OrganizerRepository $organizerRepository;
    private RoundRepository $roundRepository;

    public function __construct(
        AssociationRepository $associationRepository,
        AgeRepository $ageRepository,
        BowTypeRepository $bowTypeRepository,
        OrganizerRepository $organizerRepository,
        RoundRepository $roundRepository
    )
    {
        $this->associationRepository = $associationRepository;
        $this->ageRepository = $ageRepository;
        $this->bowTypeRepository = $bowTypeRepository;
        $this->organizerRepository = $organizerRepository;
        $this->roundRepository = $roundRepository;
    }

    public function get(): array
    {
        return [
            'associations' => $this->findChoices($this->associationRepository),
            'bowTypes' => $this->findChoices($this->bowTypeRepository),
            'ages' => $this->findChoices($this->ageRepository),
            'organizers' => $this->findChoices($this->organizerRepository),
            'rounds' => $this->findChoices($this->roundRepository),
        ];
    }

    private function findChoices(ServiceEntityRepository $repository): array
    {
        $data = $repository->findAll();

        $choices = [];

        foreach ($data as $element) {
            $choices[$element->getName()] = $element->getId();
        }

        return $choices;
    }
}