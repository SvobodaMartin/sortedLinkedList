<?php

namespace App\Entity;

use App\Repository\LinkedListRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LinkedListRepository::class)]
class LinkedList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?Node $head = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHead(): ?Node
    {
        return $this->head;
    }

    public function setHead(?Node $head): self
    {
        $this->head = $head;

        return $this;
    }
}
