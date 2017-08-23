<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenuDepot
 *
 * @ORM\Table(name="contenu_depot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContenuDepotRepository")
 */
class ContenuDepot
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
     * @ORM\Column(name="quantite", type="float", length=6)
     */
    private $quantite;
   /**
     * Plusieurs contenus sont associés à un seul dépot.
     * @ORM\ManyToOne(targetEntity="Depot", inversedBy="contenu", cascade="persist")
     * @ORM\JoinColumn(name="id_depot", referencedColumnName="id")
     */
    private $depot;
    /**
     * un dechet est associé à plusieurs contenus
     * @ORM\ManyToOne(targetEntity="Dechet",fetch="EAGER")
     * @ORM\JoinColumn(name="id_dechet", referencedColumnName="id")
     */
    private $dechet;
    /**
     * @ORM\ManyToOne(targetEntity="Facture",fetch="EAGER",inversedBy="contenuDechets")
     * @ORM\JoinColumn(name="id_facture", referencedColumnName="id")
     *
     */
    private $facture;

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
     * Set quantite
     *
     * @param float $quantite
     *
     * @return ContenuDepot
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return float
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    
    public function getDepot() {
        return $this->depot;
    }
    
    function setDepot($depot) {
        $this->depot = $depot;
    }
    
    function getDechet() {
        return $this->dechet;
    }

    function setDechet($dechet) {
        $this->dechet = $dechet;
    }
    
    function getFacture() {
        return $this->facture;
    }

    function setFacture($facture) {
        $this->facture = $facture;
    }



}

