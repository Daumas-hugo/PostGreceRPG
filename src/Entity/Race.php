<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
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
     * @ORM\OneToMany(targetEntity=SkillRace::class, mappedBy="race")
     */
    private $skillRaces;

    public function __construct()
    {
        $this->skillRaces = new ArrayCollection();
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

    /**
     * @return Collection|SkillRace[]
     */
    public function getSkillRaces(): Collection
    {
        return $this->skillRaces;
    }

    public function addSkillRace(SkillRace $skillRace): self
    {
        if (!$this->skillRaces->contains($skillRace)) {
            $this->skillRaces[] = $skillRace;
            $skillRace->setRace($this);
        }

        return $this;
    }

    public function removeSkillRace(SkillRace $skillRace): self
    {
        if ($this->skillRaces->removeElement($skillRace)) {
            // set the owning side to null (unless already changed)
            if ($skillRace->getRace() === $this) {
                $skillRace->setRace(null);
            }
        }

        return $this;
    }
}
