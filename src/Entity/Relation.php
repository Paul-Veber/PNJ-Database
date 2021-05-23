<?php

namespace App\Entity;

use App\Repository\RelationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelationRepository::class)
 */
class Relation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="relations")
     */
    private $character1;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="relations2")
     */
    private $character2;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCharacter1(): ?Character
    {
        return $this->character1;
    }

    public function setCharacter1(?Character $character1): self
    {
        $this->character1 = $character1;

        return $this;
    }

    public function getCharacter2(): ?Character
    {
        return $this->character2;
    }

    public function setCharacter2(?Character $character2): self
    {
        $this->character2 = $character2;

        return $this;
    }

}  
