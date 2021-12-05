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
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     */
    private $skillCharacters;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class)
     */
    private $itemCharacters;

    public function __construct()
    {
        $this->inventory = new ArrayCollection();
        $this->skillCharacters = new ArrayCollection();
        $this->itemCharacters = new ArrayCollection();
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkillCharacters(): Collection
    {
        return $this->skillCharacters;
    }

    public function addSkillCharacter(Skill $skillCharacter): self
    {
        if (!$this->skillCharacters->contains($skillCharacter)) {
            $this->skillCharacters[] = $skillCharacter;
            $skillCharacter->setCharacter($this);
        }

        return $this;
    }

    public function removeSkillCharacter(Skill $skillCharacter): self
    {
        if ($this->skillCharacters->removeElement($skillCharacter)) {
            // set the owning side to null (unless already changed)
            if ($skillCharacter->getCharacter() === $this) {
                $skillCharacter->setCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItemCharacters(): Collection
    {
        return $this->itemCharacters;
    }

    public function addItemCharacter(Item $itemCharacter): self
    {
        if (!$this->itemCharacters->contains($itemCharacter)) {
            $this->itemCharacters[] = $itemCharacter;
        }

        return $this;
    }

    public function removeItemCharacter(Item $itemCharacter): self
    {
        $this->itemCharacters->removeElement($itemCharacter);

        return $this;
    }
}
