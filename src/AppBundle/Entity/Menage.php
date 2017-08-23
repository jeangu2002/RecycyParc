<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Menage
 *
 * @ORM\Table(name="menage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenageRepository")
 */
class Menage
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
     * @ORM\Column(name="enfants", type="integer")
     */
    private $enfants;

    /**
     * @var int
     *
     * @ORM\Column(name="adultes", type="integer")
     */
    private $adultes;

    /**
     * @var string
     *@Assert\Regex(
     *     pattern = "/^[a-zA-Z -]+$/i",
     *     htmlPattern = "^[a-zA-Z -]+$")
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;
    
    /**
     * @var string
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z -]+$/i",
     *     htmlPattern = "^[a-zA-Z -]+$")
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *@Assert\Regex("/^\w+/")
     * @ORM\Column(name="email", type="string", length=60)
     */
    
    private $email;

    /**
     * @var string
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z -]+$/i",
     *     htmlPattern = "^[a-zA-Z -]+$")
     * @ORM\Column(name="rue", type="string", length=60)
     */
    private $rue;

    /**
     * @var int
     * @Assert\Regex(
     *     pattern="/^[0-9]{1,3}$/",
     *     match=true,
     *     message="Le numéro doit être composé de chiffres et de 3 caractères au maximum"
     * )
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var int
     * @Assert\Regex(
     *     pattern="/^[0-9]{1,3}$/",
     *     match=true,
     *     message="Your name cannot contain a number"
     * )
     * @ORM\Column(name="boite", type="integer")
     */
    private $boite;

    /**
     * @var string
     * 
     * @ORM\Column(name="commune", type="string", length=50)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="localite", type="string", length=50)
     */
    private $localite;
    /**
     * @var int
     *
     * @ORM\Column(name="coefficient_de_correction", type="integer", length=50)
     */
    private $coefficientDeCorrection;

    /**
     * @ORM\OneToMany(targetEntity="Depot", mappedBy="menage",fetch="EAGER")
     */
    private $depots;
     /**
     * @ORM\OneToMany(targetEntity="Facture", mappedBy="menage",fetch="EAGER")
     */
    private $factures;
    
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
     * Set enfants
     *
     * @param integer $enfants
     *
     * @return Menage
     */
    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;

        return $this;
    }

    /**
     * Get enfants
     *
     * @return int
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * Set adultes
     *
     * @param integer $adultes
     *
     * @return Menage
     */
    public function setAdultes($adultes)
    {
        $this->adultes = $adultes;

        return $this;
    }

    /**
     * Get adultes
     *
     * @return int
     */
    public function getAdultes()
    {
        return $this->adultes;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Menage
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
     * Get prénom
     * 
     * @param string $prenom
     * @return string 
     */
    public  function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Get prénom
     * @param string $prenom
     * 
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Menage
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Menage
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
     * @return Menage
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
     * Set boite
     *
     * @param integer $boite
     *
     * @return Menage
     */
    public function setBoite($boite)
    {
        $this->boite = $boite;

        return $this;
    }

    /**
     * Get boite
     *
     * @return int
     */
    public function getBoite()
    {
        return $this->boite;
    }

    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return Menage
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set localite
     *
     * @param string $localite
     *
     * @return Menage
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
    
    function getDepots() {
        return $this->depots;
    }

    function getFactures() {
        return $this->factures;
    }

    function setDepots($depots) {
        $this->depots = $depots;
    }

    function setFactures($factures) {
        $this->factures = $factures;
    }

    function getCoefficientDeCorrection() {
        return $this->coefficientDeCorrection;
    }

    function setCoefficientDeCorrection($coefficientDeCorrection) {
        $this->coefficientDeCorrection = $coefficientDeCorrection;
    }


}

