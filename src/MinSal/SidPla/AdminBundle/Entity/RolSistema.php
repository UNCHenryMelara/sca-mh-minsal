<?php

namespace MinSal\SidPla\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MinSal\SidPla\AdminBundle\Entity\RolSistema
 *
 * @ORM\Table(name="sca_rol")
 * @ORM\Entity
 */
class RolSistema{

     /**
     * @var integer $idRol
     *
     * @ORM\Column(name="rol_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idRol;

    /**
     * @var string $nombreRol
     *
     * @ORM\Column(name="rol_nombre", type="string", length=10)
     */
    private $nombreRol;

    /**
     * @var string $funcionesRol
     *
     * @ORM\Column(name="rol_funciones", type="string", length=300)
     */
    private $funcionesRol; 
    
    
     /**
     * ORM\OneToMany(targetEntity="MinSal\SidPla\UsersBundle\Entity\User", mappedBy="rol")
     */
    //protected $usuarios;
    
    /**
     * @ORM\ManyToMany(targetEntity="OpcionSistema")
     * @ORM\JoinTable(name="sca_rol_opcion",
     *      joinColumns={@ORM\JoinColumn(name="rol_codigo", referencedColumnName="rol_codigo")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="opcionsistema_codigo", referencedColumnName="opcionsistema_codigo")}
     *      )
     * @ORM\OrderBy({"idOpcionSistema" = "ASC"})
     */
    private $opcionesSistema;
    
    /**
     * @var boolean $rolImportador
     *
     * @ORM\Column(name="rol_compra_inter", type="boolean")
     */
    private $rolImportador;
    
    /**
     * @var boolean $rolProductor
     *
     * @ORM\Column(name="rol_productor", type="boolean")
     */
    private $rolProductor;
    
    /**
     * @var boolean $rolComprador
     *
     * @ORM\Column(name="rol_compra_local", type="boolean")
     */
    private $rolComprador;
    
    /**
     * @var string $rolTipo
     *
     * @ORM\Column(name="rol_tipo", type="string", length=20)
     */
    private $rolTipo;
    
    /**
     * @var boolean $rolInterno
     *
     * @ORM\Column(name="rol_interno", type="boolean")
     */
    private $rolInterno;
    
    /**
     * @var string $rolInternoTipo
     *
     * @ORM\Column(name="rol_interno_tipo", type="string", length=20)
     */
    private $rolInternoTipo;
    
    
    /**
     * ORM\ManyToMany(targetEntity="MinSal\SidPla\UserBundle\Entity\User", mappedBy="rols")\
     * ORM\JoinTable(name="sca_usuario_rol",joinColumns={@ORM\JoinColumn(name="rol_codigo", referencedColumnName="rol_codigo")})
     *
    private $usuarios;*/
    
    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->opcionesSistema = new ArrayCollection();
    }

    

    /**
     * Get idRol
     *
     * @return integer 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set nombreRol
     *
     * @param string $nombreRol
     */
    public function setNombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;
    }
    
    
     public function setIdRol($idRol)
    {
        $this->idRol=$idRol;
    }

    /**
     * Get nombreRol
     *
     * @return string 
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set funcionesRol
     *
     * @param string $funcionesRol
     */
    public function setFuncionesRol($funcionesRol)
    {
        $this->funcionesRol = $funcionesRol;
    }

    /**
     * Get funcionesRol
     *
     * @return string 
     */
    public function getFuncionesRol()
    {
        return $this->funcionesRol;
    }

    /**
     * Add usuarios
     *
     * @param MinSAl\SidPla\UsersBundle\Entity\User $usuarios
     */
    /*public function addUsuarios(\MinSAl\SidPla\UsersBundle\Entity\User $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }*/

    /**
     * Get usuarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
    
    
     public function __toString()
    {
       return $this->getNombreRol();
    }
    

    /**
     * Add opcionesSistema
     *
     * @param MinSal\SidPla\AdminBundle\Entity\OpcionSistema $opcionesSistema
     */
    public function addOpcionesSistema(\MinSal\SidPla\AdminBundle\Entity\OpcionSistema $opcionesSistema)
    {
        $this->opcionesSistema[] = $opcionesSistema;
    }

    /**
     * Get opcionesSistema
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getOpcionesSistema()
    {
        return $this->opcionesSistema;
    }

    /**
     * Add usuarios
     *
     * @param MinSal\SidPla\UsersBundle\Entity\User $usuarios
     */
    /*public function addUser(\MinSal\SidPla\UsersBundle\Entity\User $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }*/

    /**
     * Add opcionesSistema
     *
     * @param MinSal\SidPla\AdminBundle\Entity\OpcionSistema $opcionesSistema
     */
    public function addOpcionSistema(\MinSal\SidPla\AdminBundle\Entity\OpcionSistema $opcionesSistema)
    {
        $this->opcionesSistema[] = $opcionesSistema;
    }
    
    public function getRolImportador() {
        return $this->rolImportador;
    }

    public function setRolImportador($rolImportador) {
        $this->rolImportador = $rolImportador;
    }

    public function getRolProductor() {
        return $this->rolProductor;
    }

    public function setRolProductor($rolProductor) {
        $this->rolProductor = $rolProductor;
    }

    public function getRolComprador() {
        return $this->rolComprador;
    }

    public function setRolComprador($rolComprador) {
        $this->rolComprador = $rolComprador;
    }

    public function getRolTipo() {
        return $this->rolTipo;
    }

    public function setRolTipo($rolTipo) {
        $this->rolTipo = $rolTipo;
    }

    public function getRolInterno() {
        return $this->rolInterno;
    }

    public function setRolInterno($rolInterno) {
        $this->rolInterno = $rolInterno;
    }

    public function getRolInternoTipo() {
        return $this->rolInternoTipo;
    }

    public function setRolInternoTipo($rolInternoTipo) {
        $this->rolInternoTipo = $rolInternoTipo;
    }
}