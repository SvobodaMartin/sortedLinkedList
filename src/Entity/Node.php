<?php

namespace App\Entity;

use App\Entity\Enums\actions;
use App\Repository\NodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NodeRepository::class)]
class Node
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $next = null;

    #[ORM\Column(length: 255)]
    private ?string $data = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNext(): ?self
    {
        return $this->next;
    }

    public function setNext(?self $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }
}
