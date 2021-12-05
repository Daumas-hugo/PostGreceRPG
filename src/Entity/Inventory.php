<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryRepository::class)
 */
class Inventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=character::class, inversedBy="inventory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $character;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacter(): ?character
    {
        return $this->character;
    }

    public function setCharacter(?character $character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getItem(): ?item
    {
        return $this->item;
    }

    public function setItem(?item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
