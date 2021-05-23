<?php

namespace App\Entity;

use App\Repository\CampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampaignRepository::class)
 */
class Campaign
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $game;

    /**
     * @ORM\OneToMany(targetEntity=Scenario::class, mappedBy="campaign")
     */
    private $scenario;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="campaign")
     */
    private $character;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="campaign")
     */
    private $notes;

    public function __construct()
    {
        $this->scenario = new ArrayCollection();
        $this->character = new ArrayCollection();
        $this->notes = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(string $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getScenario(): Collection
    {
        return $this->scenario;
    }

    public function addScenario(Scenario $scenario): self
    {
        if (!$this->scenario->contains($scenario)) {
            $this->scenario[] = $scenario;
            $scenario->setCampaign($this);
        }

        return $this;
    }

    public function removeScenario(Scenario $scenario): self
    {
        if ($this->scenario->removeElement($scenario)) {
            // set the owning side to null (unless already changed)
            if ($scenario->getCampaign() === $this) {
                $scenario->setCampaign(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacter(): Collection
    {
        return $this->character;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->character->contains($character)) {
            $this->character[] = $character;
            $character->setCampaign($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->character->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCampaign() === $this) {
                $character->setCampaign(null);
            }
        }

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
            $note->setCampaign($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getCampaign() === $this) {
                $note->setCampaign(null);
            }
        }

        return $this;
    }
}
