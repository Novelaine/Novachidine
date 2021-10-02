<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_arrivee;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depart;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_animaux;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $type_animaux;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_personnes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_enfants;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): self
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getNombreAnimaux(): ?int
    {
        return $this->nombre_animaux;
    }

    public function setNombreAnimaux(?int $nombre_animaux): self
    {
        $this->nombre_animaux = $nombre_animaux;

        return $this;
    }

    public function getTypeAnimaux(): ?string
    {
        return $this->type_animaux;
    }

    public function setTypeAnimaux(?string $type_animaux): self
    {
        $this->type_animaux = $type_animaux;

        return $this;
    }

    public function getNombrePersonnes(): ?int
    {
        return $this->nombre_personnes;
    }

    public function setNombrePersonnes(int $nombre_personnes): self
    {
        $this->nombre_personnes = $nombre_personnes;

        return $this;
    }

    public function getNombreEnfants(): ?int
    {
        return $this->nombre_enfants;
    }

    public function setNombreEnfants(?int $nombre_enfants): self
    {
        $this->nombre_enfants = $nombre_enfants;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }



}
