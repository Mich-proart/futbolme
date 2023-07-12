<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartidoRepository")
 */
class Partido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Temporada", inversedBy="partidos")
     */
    private $temporada;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Noticias", mappedBy="partido")
     */
    private $noticias;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipos", inversedBy="partidos")
     * @ORM\JoinColumn(nullable=false, name="equipoLocal_id", referencedColumnName="id")
     */
    private $equipoLocal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipos", inversedBy="partidos")
     * @ORM\JoinColumn(nullable=false, name="equipoVisitante_id", referencedColumnName="id")
     */
    private $equipoVisitante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $jornada;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    public function __construct()
    {
        $this->noticias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemporada(): ?Temporada
    {
        return $this->temporada;
    }

    public function setTemporada(?Temporada $temporada): self
    {
        $this->temporada = $temporada;

        return $this;
    }

    /**
     * @return Collection|Noticias[]
     */
    public function getNoticias(): Collection
    {
        return $this->noticias;
    }

    public function addNoticia(Noticias $noticia): self
    {
        if (!$this->noticias->contains($noticia)) {
            $this->noticias[] = $noticia;
            $noticia->addPartido($this);
        }

        return $this;
    }

    public function removeNoticia(Noticias $noticia): self
    {
        if ($this->noticias->contains($noticia)) {
            $this->noticias->removeElement($noticia);
            $noticia->removePartido($this);
        }

        return $this;
    }

    public function getEquipoLocal(): ?Equipos
    {
        return $this->equipoLocal;
    }

    public function setEquipoLocal(?Equipos $equipoLocal): self
    {
        $this->equipoLocal = $equipoLocal;

        return $this;
    }

    public function getEquipoVisitante(): ?Equipos
    {
        return $this->equipoVisitante;
    }

    public function setEquipoVisitante(?Equipos $equipoVisitante): self
    {
        $this->equipoVisitante = $equipoVisitante;

        return $this;
    }

    public function getJornada(): ?int
    {
        return $this->jornada;
    }

    public function setJornada(int $jornada): self
    {
        $this->jornada = $jornada;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
