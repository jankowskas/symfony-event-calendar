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
    private array $eventCategories = [];

    #[ORM\Column(nullable: true)]
    private array $divisions = [];

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Anchor::class)]
    private Collection $anchors;

    public function __construct()
    {
        $this->anchors = new ArrayCollection();
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

    public function getEventCategories(): array
    {
        return $this->eventCategories;
    }

    public function setEventCategories(?array $eventCategories): self
    {
        $this->eventCategories = $eventCategories;

        return $this;
    }

    public function getDivisions(): array
    {
        return $this->divisions;
    }

    public function setDivisions(?array $divisions): self
    {
        $this->divisions = $divisions;

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

    /**
     * @return Collection<int, Anchor>
     */
    public function getAnchors(): Collection
    {
        return $this->anchors;
    }

    public function addAnchor(Anchor $anchor): self
    {
        if (!$this->anchors->contains($anchor)) {
            $this->anchors->add($anchor);
            $anchor->setEvent($this);
        }

        return $this;
    }

    public function removeAnchor(Anchor $anchor): self
    {
        if ($this->anchors->removeElement($anchor)) {
            // set the owning side to null (unless already changed)
            if ($anchor->getEvent() === $this) {
                $anchor->setEvent(null);
            }
        }

        return $this;
    }
}
