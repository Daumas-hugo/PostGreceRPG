<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
     * @ORM\ManyToMany(targetEntity=Skill::class)
     */
    private $skillClasses;

    public function __construct()
    {
        $this->skillClasses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
     * @return Collection|Skill[]
     */
    public function getSkillClasses(): Collection
    {
        return $this->skillClasses;
    }

    public function addSkillClass(Skill $skillClass): self
    {
        if (!$this->skillClasses->contains($skillClass)) {
            $this->skillClasses[] = $skillClass;
        }

        return $this;
    }

    public function removeSkillClass(Skill $skillClass): self
    {
        $this->skillClasses->removeElement($skillClass);

        return $this;
    }
}
