<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dechet
 *
 * @ORM\Table(name="dechet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DechetRepository")
 */
class Dechet implements \JsonSerializable
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
     * @var int
     *
     * @ORM\Column(name="quota", type="float", length=6)
     */
    private $quota;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="valumeDeBase", type="float")
     */
    private $volumeDeBase;
     /**
     * @var float
     *
     * @ORM\Column(name="forfait20", type="float",nullable=true)
     */
    private $forfait20;
     /**
     * @var float
     *
     * @ORM\Column(name="variable_20", type="float",nullable=true)
     */
    private $variable20;
     /**
     * @var float
     *
     * @ORM\Column(name="forfait_50", type="float",nullable=true)
     */
    private $forfait50;
     /**
     * @var float
     *
     * @ORM\Column(name="variable_50", type="float", nullable=true)
     */
    private $variable50;
     /**
     * @var float
     *
     * @ORM\Column(name="forfait_50_plus", type="float", nullable=true)
     */
    private $forfait50Plus;
     /**
     * @var float
     *
     * @ORM\Column(name="variable_50_plus", type="float", nullable=true)
     */
    private $variable50Plus;
    
    /**
     * @ORM\OneToOne(targetEntity="Conteneur", inversedBy="dechets")
     * @ORM\JoinColumn(name="id_conteneurt", referencedColumnName="id")
     */
    private $conteneur;
    
    
    public function __construct()
    {
        $this->depots = new ArrayCollection();
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
     * Set quota
     *
     * @param string $quota
     *
     * @return Dechet
     */
    public function setQuota($quota)
    {
        $this->quota = $quota;

        return $this;
    }

    /**
     * Get quota
     *
     * @return string
     */
    public function getQuota()
    {
        return $this->quota;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Dechet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set valumeDeBase
     *
     * @param float $valumeDeBase
     *
     * @return Dechet
     */
    public function setVolumeDeBase($valumeDeBase)
    {
        $this->volumeDeBase = $valumeDeBase;

    }

    /**
     * Get valumeDeBase
     *
     * @return float
     */
    public function getVolumeDeBase()
    {
        return $this->volumeDeBase;
    }
    
    public function setConteneur($conteneur)
    {
        $this->conteneur = $conteneur;
    }
    
    public function getConteneur()
    {
        return $this->conteneur;
    }
    
    function getForfait20() {
        return $this->forfait20;
    }

    function getVariable20() {
        return $this->variable20;
    }

    function getForfait50() {
        return $this->forfait50;
    }

    function getVariable50() {
        return $this->variable50;
    }

    function getForfait50Plus() {
        return $this->forfait50Plus;
    }

    function getVariable50Plus() {
        return $this->variable50Plus;
    }

    function setForfait20($forfait20) {
        $this->forfait20 = $forfait20;
    }

    function setVariable20($variable20) {
        $this->variable20 = $variable20;
    }

    function setForfait50($forfait50) {
        $this->forfait50 = $forfait50;
    }

    function setVariable50($variable50) {
        $this->variable50 = $variable50;
    }

    function setForfait50Plus($forfait50Plus) {
        $this->forfait50Plus = $forfait50Plus;
    }

    function setVariable50Plus($variable50Plus) {
        $this->variable50Plus = $variable50Plus;
    }

    
    public function jsonSerialize() {
        return array(
            'id'=>$this->id,
            'nom' => $this->nom,
            'volumeDeBase'=> $this->volumeDeBase
            
        );
    }

}

