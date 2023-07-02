<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?Organizer $organizer = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $published = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Contact $contact = null;

    #[ORM\Column(length: 2048, nullable: true)]
    private ?string $anchors = null;

    #[ORM\ManyToMany(targetEntity: Round::class)]
    private Collection $rounds;

    #[ORM\ManyToMany(targetEntity: Division::class)]
    private Collection $divisions;

    #[ORM\ManyToMany(targetEntity: BowType::class)]
    private Collection $bowTypes;

    #[ORM\ManyToMany(targetEntity: BowClass::class)]
    private Collection $bowClasses;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Association $associations = null;

    public function __construct()
    {
        $this->rounds = new ArrayCollection();
        $this->divisions = new ArrayCollection();
        $this->bowTypes = new ArrayCollection();
        $this->bowClasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOrganizer(): ?Organizer
    {
        return $this->organizer;
    }

    public function setOrganizer(?Organizer $organizer): self
    {
        $this->organizer = $organizer;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getAnchors(): ?string
    {
        return $this->anchors;
    }

    public function setAnchors(?string $anchors): self
    {
        $this->anchors = $anchors;

        return $this;
    }

    /**
     * @return Collection<int, Round>
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(Round $round): self
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);
        }

        return $this;
    }

    public function removeRound(Round $round): self
    {
        $this->rounds->removeElement($round);

        return $this;
    }

    /**
     * @return Collection<int, Division>
     */
    public function getDivisions(): Collection
    {
        return $this->divisions;
    }

    public function addDivision(Division $division): self
    {
        if (!$this->divisions->contains($division)) {
            $this->divisions->add($division);
        }

        return $this;
    }

    public function removeDivision(Division $division): self
    {
        $this->divisions->removeElement($division);

        return $this;
    }

    /**
     * @return Collection<int, BowType>
     */
    public function getBowTypes(): Collection
    {
        return $this->BbowTypes;
    }

    public function addBowType(BowType $bowType): self
    {
        if (!$this->bowTypes->contains($bowType)) {
            $this->bowTypes->add($bowType);
        }

        return $this;
    }

    public function removeBowType(BowType $bowType): self
    {
        $this->bowTypes->removeElement($bowType);

        return $this;
    }

    /**
     * @return Collection<int, BowClass>
     */
    public function getBowClasses(): Collection
    {
        return $this->bowClasses;
    }

    public function addBowClass(BowClass $bowClass): self
    {
        if (!$this->bowClasses->contains($bowClass)) {
            $this->bowClasses->add($bowClass);
        }

        return $this;
    }

    public function removeBowClass(BowClass $bowClass): self
    {
        $this->bowClasses->removeElement($bowClass);

        return $this;
    }

    public function getAssociations(): ?Association
    {
        return $this->associations;
    }

    public function setAssociations(?Association $associations): self
    {
        $this->associations = $associations;

        return $this;
    }
}
