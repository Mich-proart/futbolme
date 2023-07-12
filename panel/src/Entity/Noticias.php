<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoticiasRepository")
 */
class Noticias
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(name="titulo_validado", type="string", length=255)
     */
    private $tituloValidado;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(name="descripcion_validada", type="text")
     */
    private $descripcionValidada;

    /**
     * @ORM\Column(name="descripcion_corta", type="text")
     */
    private $descripcionCorta;

    /**
     * @ORM\Column(name="descripcion_corta_validada", type="text")
     */
    private $descripcionCortaValidada;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="smallint")
     */
    private $estado;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Temporada", inversedBy="noticias")
     */
    private $temporada;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Partido", inversedBy="noticias")
     */
    private $partido;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipos", inversedBy="noticias")
     */
    private $equipos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Comunidad", inversedBy="noticias")
     */
    private $comunidad;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Division", inversedBy="noticias")
     */
    private $division;

    /**
     * @ORM\Column(type="integer")
     */
    private $posicion;

    public function __construct()
    {
        $this->temporada = new ArrayCollection();
        $this->partido = new ArrayCollection();
        $this->equipos = new ArrayCollection();
        $this->comunidad = new ArrayCollection();
        $this->division = new ArrayCollection();

        $this->estado = -1;
        $this->tituloValidado = '';
        $this->descripcionCortaValidada = '';
        $this->descripcionValidada = '';
        $this->posicion = 0;

        $tz = new \DateTimeZone('Europe/Madrid');
        $this->fecha = new \DateTime('now', $tz);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTituloValidado()
    {
        return $this->tituloValidado;
    }

    /**
     * @param mixed $tituloValidado
     * @return Noticias
     */
    public function setTituloValidado($tituloValidado)
    {
        $this->tituloValidado = $tituloValidado;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getDescripcionCorta()
    {
        return $this->descripcionCorta;
    }

    /**
     * @param mixed $descripcionCorta
     * @return Noticias
     */
    public function setDescripcionCorta($descripcionCorta)
    {
        $this->descripcionCorta = $descripcionCorta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcionCortaValidada()
    {
        return $this->descripcionCortaValidada;
    }

    /**
     * @param mixed $descripcionCortaValidada
     * @return Noticias
     */
    public function setDescripcionCortaValidada($descripcionCortaValidada)
    {
        $this->descripcionCortaValidada = $descripcionCortaValidada;
        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcionValidada()
    {
        return $this->descripcionValidada;
    }

    /**
     * @param mixed $descripcionValidada
     * @return Noticias
     */
    public function setDescripcionValidada($descripcionValidada)
    {
        $this->descripcionValidada = $descripcionValidada;
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

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Temporada[]
     */
    public function getTemporada(): Collection
    {
        return $this->temporada;
    }

    public function addTemporada(Temporada $temporada): self
    {
        if (!$this->temporada->contains($temporada)) {
            $this->temporada[] = $temporada;
        }

        return $this;
    }

    public function removeTemporada(Temporada $temporada): self
    {
        if ($this->temporada->contains($temporada)) {
            $this->temporada->removeElement($temporada);
        }

        return $this;
    }

    /**
     * @return Collection|Partido[]
     */
    public function getPartido(): Collection
    {
        return $this->partido;
    }

    public function addPartido(Partido $partido): self
    {
        if (!$this->partido->contains($partido)) {
            $this->partido[] = $partido;
        }

        return $this;
    }

    public function removePartido(Partido $partido): self
    {
        if ($this->partido->contains($partido)) {
            $this->partido->removeElement($partido);
        }

        return $this;
    }

    /**
     * @return Collection|Equipos[]
     */
    public function getEquipos(): Collection
    {
        return $this->equipos;
    }

    public function addEquipo(Equipos $equipo): self
    {
        if (!$this->equipos->contains($equipo)) {
            $this->equipos[] = $equipo;
        }

        return $this;
    }

    public function removeEquipo(Equipos $equipo): self
    {
        if ($this->equipos->contains($equipo)) {
            $this->equipos->removeElement($equipo);
        }

        return $this;
    }

    /**
     * @return Collection|Comunidad[]
     */
    public function getComunidad(): Collection
    {
        return $this->comunidad;
    }

    public function addComunidad(Comunidad $comunidad): self
    {
        if (!$this->comunidad->contains($comunidad)) {
            $this->comunidad[] = $comunidad;
        }

        return $this;
    }

    public function removeComunidad(Comunidad $comunidad): self
    {
        if ($this->comunidad->contains($comunidad)) {
            $this->comunidad->removeElement($comunidad);
        }

        return $this;
    }

    /**
     * @return Collection|Division[]
     */
    public function getDivision(): Collection
    {
        return $this->division;
    }

    public function addDivision(Division $division): self
    {
        if (!$this->division->contains($division)) {
            $this->division[] = $division;
        }

        return $this;
    }

    public function removeDivision(Division $division): self
    {
        if ($this->division->contains($division)) {
            $this->division->removeElement($division);
        }

        return $this;
    }

    public function getPosicion(): ?int
    {
        return $this->posicion;
    }

    public function setPosicion(int $posicion): self
    {
        $this->posicion = $posicion;

        return $this;
    }
}
