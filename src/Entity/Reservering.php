<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reserverings")
     */
    private $kamerId;

    /**
     * @ORM\ManyToOne(targetEntity=FosUser::class, inversedBy="reserverings")
     */
    private $userId;

    /**
     * @ORM\Column(type="date")
     */
    private $checkinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutDate;

    /**
     * @ORM\OneToOne(targetEntity=betaal::class, cascade={"persist", "remove"})
     */
    private $betaalid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalMethode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerId(): ?Kamer
    {
        return $this->kamerId;
    }

    public function setKamerId(?Kamer $kamerId): self
    {
        $this->kamerId = $kamerId;

        return $this;
    }

    public function getUserId(): ?FosUser
    {
        return $this->userId;
    }

    public function setUserId(?FosUser $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkinDate;
    }

    public function setCheckinDate(\DateTimeInterface $checkinDate): self
    {
        $this->checkinDate = $checkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): self
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }

    public function getBetaalid(): ?betaal
    {
        return $this->betaalid;
    }

    public function setBetaalid(?betaal $betaalid): self
    {
        $this->betaalid = $betaalid;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->betaalMethode;
    }

    public function setBetaalMethode(string $betaalMethode): self
    {
        $this->betaalMethode = $betaalMethode;

        return $this;
    }
}
