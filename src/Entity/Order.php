<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Member $user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicle $vehicule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_date_time = null;

    #[ORM\Column(length: 255)]
    private ?string $total_price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $registration_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Member
    {
        return $this->user;
    }

    public function setUser(?Member $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getVehicule(): ?Vehicle
    {
        return $this->vehicule;
    }

    public function setVehicule(Vehicle $vehicule): static
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->start_date_time;
    }

    public function setStartDateTime(\DateTimeInterface $start_date_time): static
    {
        $this->start_date_time = $start_date_time;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeInterface
    {
        return $this->end_date_time;
    }

    public function setEndDateTime(\DateTimeInterface $end_date_time): static
    {
        $this->end_date_time = $end_date_time;

        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->total_price;
    }

    public function setTotalPrice(string $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(?\DateTimeInterface $registration_date): static
    {
        $this->registration_date = $registration_date;

        return $this;
    }
}
