<?php

namespace App\Entity;
use App\Repository\OffreRepository;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoffre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="titleoffre", type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your title name must be at least {{ limit }} characters long",
     *      maxMessage = "Your title name cannot be longer than {{ limit }} characters"
     * )
     */
    private $titleoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="priceoffre", type="string", length=255, nullable=false)
     */
    private $priceoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreplace", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $nombreplace;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=false)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    public function getIdoffre(): ?int
    {
        return $this->idoffre;
    }

    public function getTitleoffre(): ?string
    {
        return $this->titleoffre;
    }

    public function setTitleoffre(string $titleoffre): self
    {
        $this->titleoffre = $titleoffre;

        return $this;
    }

    public function getPriceoffre(): ?string
    {
        return $this->priceoffre;
    }

    public function setPriceoffre(string $priceoffre): self
    {
        $this->priceoffre = $priceoffre;

        return $this;
    }

    public function getNombreplace(): ?string
    {
        return $this->nombreplace;
    }

    public function setNombreplace(string $nombreplace): self
    {
        $this->nombreplace = $nombreplace;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

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
