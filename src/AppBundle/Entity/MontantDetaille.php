<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MontantDetaille
 *
 * @ORM\Table(name="montant_detaille")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MontantDetailleRepository")
 */
class MontantDetaille implements \JsonSerializable
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
     * @ORM\Column(name="montant", type="float", nullable=true)
     */
    private $montant;
    /**
     * @var float
     *
     * @ORM\Column(name="quantite", type="float", nullable=true)
     */
    private $quantite;
    
    /**
     * @ORM\ManyToOne(targetEntity="Facture", inversedBy="montantsDetailles")
     * @ORM\JoinColumn(name="id_facture", referencedColumnName="id")
     */
    private $facture;
    /**
     * @ORM\ManyToOne(targetEntity="Dechet")
     * @ORM\JoinColumn(name="id_dechet", referencedColumnName="id")
     */
    private $dechet;


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
     * Set montant
     *
     * @param float $montant
     *
     * @return MontantDetaille
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }
    function getFacture() {
        return $this->facture;
    }

    function getDechet() {
        return $this->dechet;
    }

    function setFacture($facture) {
        $this->facture = $facture;
    }

    function setDechet($dechet) {
        $this->dechet = $dechet;
    }

    
    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }
    function getQuantite() {
        return $this->quantite;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

        
    public function addQuantite($quantite)
    {
        $this->quantite += $quantite;
    }

    public function jsonSerialize() {
         return array(
            'dechet'=>$this->dechet,
            'quantite' => $this->quantite,
            'montant'=>$this->montant
            
        );
    }

}

