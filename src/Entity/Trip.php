<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TripRepository::class)]
class Trip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $trip_img = null;

    #[ORM\Column(length: 255)]
    private ?string $trip_name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 65)]
    private ?string $destination = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $duration = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $nextdeparture = null;

    /**
     * @var Collection<int, country>
     */
    #[ORM\ManyToMany(targetEntity: country::class, inversedBy: 'trips')]
    private Collection $Country;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'trip')]
    private Collection $Comment;

    /**
     * @var Collection<int, tag>
     */
    #[ORM\ManyToMany(targetEntity: tag::class, inversedBy: 'trips')]
    private Collection $tag;

    public function __construct()
    {
        $this->Country = new ArrayCollection();
        $this->Comment = new ArrayCollection();
        $this->tag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTripImg(): ?string
    {
        return $this->trip_img;
    }

    public function setTripImg(string $trip_img): static
    {
        $this->trip_img = $trip_img;

        return $this;
    }

    public function getTripName(): ?string
    {
        return $this->trip_name;
    }

    public function setTripName(string $trip_name): static
    {
        $this->trip_name = $trip_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): static
    {
        $this->destination = $destination;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getNextdeparture(): ?\DateTimeInterface
    {
        return $this->nextdeparture;
    }

    public function setNextdeparture(\DateTimeInterface $nextdeparture): static
    {
        $this->nextdeparture = $nextdeparture;

        return $this;
    }

    /**
     * @return Collection<int, country>
     */
    public function getCountry(): Collection
    {
        return $this->Country;
    }

    public function addCountry(country $country): static
    {
        if (!$this->Country->contains($country)) {
            $this->Country->add($country);
        }

        return $this;
    }

    public function removeCountry(country $country): static
    {
        $this->Country->removeElement($country);

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->Comment;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->Comment->contains($comment)) {
            $this->Comment->add($comment);
            $comment->setTrip($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->Comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrip() === $this) {
                $comment->setTrip(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, tag>
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(tag $tag): static
    {
        if (!$this->tag->contains($tag)) {
            $this->tag->add($tag);
        }

        return $this;
    }

    public function removeTag(tag $tag): static
    {
        $this->tag->removeElement($tag);

        return $this;
    }
}
