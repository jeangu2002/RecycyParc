<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Parc
 *
 * @ORM\Table(name="parc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParcRepository")
 */
class Parc
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=70)
     */
    private $rue;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="localite", type="string", length=50)
     */
    private $localite;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=12)
     */
    private $telephone;
    
    /**
     * A park has many containers.
     * @ORM\OneToMany(targetEntity="Conteneur", mappedBy="parc")
     */
    private $conteneurs;
    /**
     * @ORM\OneToMany(targetEntity="Utilisateur", mappedBy="parc")
     */
    private $employes;
    
    public function __construct()
    {
        $this->conteneurs = new ArrayCollection();
        $this->employes = new ArrayCollection();
    }
    
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
     * Set rue
     *
     * @param string $rue
     *
     * @return Parc
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Parc
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Parc
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set localite
     *
     * @param string $localite
     *
     * @return Parc
     */
    public function setLocalite($localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return string
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Parc
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    
    function getConteneurs() {
        return $this->conteneurs;
    }

    function getEmployes() {
        return $this->employes;
    }

    function setConteneurs($conteneurs) {
        $this->conteneurs = $conteneurs;
    }

    function setEmployes($employes) {
        $this->employes = $employes;
    }


}

