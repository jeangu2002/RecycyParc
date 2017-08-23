<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conteneur
 *
 * @ORM\Table(name="conteneur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConteneurRepository")
 */
class Conteneur
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
     * @var float
     *
     * @ORM\Column(name="contenance", type="float")
     */
    private $contenance;

    /**
     * @var int
     *
     * @ORM\Column(name="emplacement", type="integer")
     */
    private $emplacement;

    /**
     * @var float
     *
     * @ORM\Column(name="niveau", type="float",nullable=true, options={"default" : 0})
     */
    private $niveau=0;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat=0;
    
    /**
     * @ORM\ManyToOne(targetEntity="Parc", inversedBy="conteneurs")
     * @ORM\JoinColumn(name="id_parc", referencedColumnName="id")
     */
    private $parc;
    
     /**
     * @ORM\OneToOne(targetEntity="Dechet", mappedBy="conteneur")
      *@ORM\JoinColumn(name="id_dechet", referencedColumnName="id")
     */
    private $dechets;
    
    
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
     * Set contenance
     *
     * @param float $contenance
     *
     * @return Conteneur
     */
    public function setContenance($contenance)
    {
        $this->contenance = $contenance;

        return $this;
    }

    /**
     * Get contenance
     *
     * @return float
     */
    public function getContenance()
    {
        return $this->contenance;
    }

    /**
     * Set emplacement
     *
     * @param integer $emplacement
     *
     * @return Conteneur
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return int
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Set idParc
     *
     * @param integer $idParc
     *
     * @return Conteneur
     */
    public function setIdParc($idParc)
    {
        $this->idParc = $idParc;

        return $this;
    }

    /**
     * Get idParc
     *
     * @return int
     */
    public function getIdParc()
    {
        return $this->idParc;
    }

    /**
     * Set idDechet
     *
     * @param integer $idDechet
     *
     * @return Conteneur
     */
    public function setIdDechet($idDechet)
    {
        $this->idDechet = $idDechet;

        return $this;
    }

    /**
     * Get idDechet
     *
     * @return int
     */
    public function getIdDechet()
    {
        return $this->idDechet;
    }

    /**
     * Set niveau
     *
     * @param float $niveau
     *
     * @return Conteneur
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return float
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Conteneur
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }
    
    public function getDechets()
    {
        return $this->dechets;
    }
    
    public function setDechets($dechets)
    {
        $this->dechets = $dechets;
    }
    
    public function getParc()
    {
        return $this->parc;
    }
    
    public function setParc($parc)
    {
        $this->parc = $parc;
    }
    function setId($id) {
        $this->id = $id;
    }
    
    
    
}

