<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FactureRepository")
 */
class Facture
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
     * @var \DateTime
     *
     * @ORM\Column(name="datefacture", type="date")
     */
    private $datefacture;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var int
     *
     * @ORM\Column(name="statut", type="integer")
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="echeance", type="date", nullable=true)
     */
    private $echeance;
     /**
     * @ORM\ManyToOne(targetEntity="Menage", inversedBy="factures")
     * @ORM\JoinColumn(name="id_menage", referencedColumnName="id")
     */
    private $menage;
     /**
     * 
     * @ORM\OneToMany(targetEntity="MontantDetaille", mappedBy="facture", cascade={"persist","remove"},fetch="EAGER")
     */
    private $montantsDetailles;
    
    /**
     *
     * @var type 
     * @ORM\OneToMany(targetEntity="ContenuDepot", mappedBy="facture", cascade={"persist","remove"},fetch="EAGER")
     */
    private $contenuDechets;
    
    function __construct() {
        $this->contenuDechets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datefacture = new \DateTime('now');
        $this->echeance = $this->datefacture->add(new \DateInterval('P21D'));
        $this->statut = 0;
        $this->montantsDetailles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set datefacture
     *
     * @param \DateTime $datefacture
     *
     * @return Facture
     */
    public function setDatefacture($datefacture)
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    /**
     * Get datefacture
     *
     * @return \DateTime
     */
    public function getDatefacture()
    {
        return $this->datefacture;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Facture
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Facture
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return int
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set echeance
     *
     * @param \DateTime $echeance
     *
     * @return Facture
     */
    public function setEcheance($echeance)
    {
        $this->echeance = $echeance;

        return $this;
    }

    /**
     * Get echeance
     *
     * @return \DateTime
     */
    public function getEcheance()
    {
        return $this->echeance;
    }
    
    public function setMenage($menage) {
        $this->menage = $menage;
    }
    
    public function getMenage() {
        return $this->menage;
    }
    function getContenuDechets() {
        return $this->contenuDechets;
    }

    function setContenuDechets( $contenuDechets) {
        $this->contenuDechets = $contenuDechets;
    }
    
    public function addContenuDechet($contenu) {
        $this->contenuDechets->add($contenu);
    }

    function setId($id) {
        $this->id = $id;
    }

    public function addMontantDetaille($montant) {
        $this->montantsDetailles->add($montant);
    }
    
    public function calculateTotalAmount() {
        $this->montant=0;
        foreach ($this->montantsDetailles as $montantDetaille) {
            $this->montant += $montantDetaille->getMontant();
        }
    }

}

