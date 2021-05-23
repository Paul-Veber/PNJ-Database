<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $faction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $occupation;

    /**
     * @ORM\ManyToOne(targetEntity=Campaign::class, inversedBy="character")
     */
    private $campaign;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="character")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=Relation::class, mappedBy="character1")
     */
    private $relations;


    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->relations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFaction(): ?string
    {
        return $this->faction;
    }

    public function setFaction(string $faction): self
    {
        $this->faction = $faction;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(?Campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setCharacter($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getCharacter() === $this) {
                $note->setCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Relation[]
     */
    public function getRelations(): Collection
    {
        return $this->relations;
    }

    public function addRelations(Relation $relations): self
    {
        if (!$this->relations->contains($relations)) {
            $this->relations[] = $relations;
            $relations->setCharacter1($this);
        }

        return $this;
    }

    public function removeRelations(Relation $relations): self
    {
        if ($this->relations->removeElement($relations)) {
            // set the owning side to null (unless already changed)
            if ($relations->getCharacter1() === $this) {
                $relations->setCharacter1(null);
            }
        }

        return $this;
    }

}
