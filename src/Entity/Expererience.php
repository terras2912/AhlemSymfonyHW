<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expererience
 *
 * @ORM\Table(name="expererience", indexes={@ORM\Index(name="fk_expererience_cv1_idx", columns={"cv_id"})})
 * @ORM\Entity
 */
class Expererience
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=45, nullable=true)
     */
    private $company;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_at", type="datetime", nullable=true)
     */
    private $startAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_at", type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_actual", type="boolean", nullable=true)
     */
    private $isActual;

    /**
     * @var \Cv
     *
     * @ORM\ManyToOne(targetEntity="Cv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_id", referencedColumnName="id")
     * })
     */
    private $cv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getIsActual(): ?bool
    {
        return $this->isActual;
    }

    public function setIsActual(?bool $isActual): self
    {
        $this->isActual = $isActual;

        return $this;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function setCv(?Cv $cv): self
    {
        $this->cv = $cv;

        return $this;
    }


}
