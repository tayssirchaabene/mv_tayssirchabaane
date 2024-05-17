<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $subject = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getemail(): ?string
    {
        return $this->email;
    }

    public function setemail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getname(): ?string
    {
        return $this->name;
    }

 public function setname(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getsubject(): ?string
    {
        return $this->subject;
    }

 public function setsubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getmessage(): ?string
    {
        return $this->message;
    }

 public function setmessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }


}
