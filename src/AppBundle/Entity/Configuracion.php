<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConfiguracionRepository")
 */
class Configuracion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_consultas", type="smallint", nullable=true)
     */
    private $numeroConsultas;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="servicio_actualizado", type="date", nullable=true)
     */
    private $servicioActualizado;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroConsultas
     *
     * @param integer $numeroConsultas
     *
     * @return Configuracion
     */
    public function setNumeroConsultas($numeroConsultas)
    {
        $this->numeroConsultas = $numeroConsultas;

        return $this;
    }

    /**
     * Get numeroConsultas
     *
     * @return int
     */
    public function getNumeroConsultas()
    {
        return $this->numeroConsultas;
    }

    /**
     * Set servicioActualizado
     *
     * @param \DateTime $servicioActualizado
     *
     * @return Configuracion
     */
    public function setServicioActualizado($servicioActualizado)
    {
        $this->servicioActualizado = $servicioActualizado;

        return $this;
    }

    /**
     * Get servicioActualizado
     *
     * @return \DateTime
     */
    public function getServicioActualizado()
    {
        return $this->servicioActualizado;
    }
}
