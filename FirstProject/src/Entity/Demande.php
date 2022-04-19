<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DemandeRepository;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande

{
    /**
     * @var int
     *
     * @ORM\Column(name="iddemande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddemande;

    /**
     * @var string
     *
     * @ORM\Column(name="nomprenom", type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 8,
     *      max = 50,
     *      minMessage = "Your last name must be at least {{ limit }} characters long",
     *      maxMessage = "Your last name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nomprenom;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     * @Assert\Length(min = 8, max = 20, minMessage = "min_lenght", maxMessage = "max_lenght")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="number_only")

     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="datedebut", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="this field is required")

     */
    private $datedebut;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    public function getIddemande(): ?int
    {
        return $this->iddemande;
    }

    public function getNomprenom(): ?string
    {
        return $this->nomprenom;
    }

    public function setNomprenom(string $nomprenom): self
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    public function setDatedebut(string $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


}
