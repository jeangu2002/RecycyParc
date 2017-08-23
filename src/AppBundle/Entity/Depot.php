<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Depot
 *
 * @ORM\Table(name="depot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepotRepository")
 */
class Depot
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    /**
     * @var int
     *
     * @ORM\Column(name="volume", type="float", nullable=true)
     */
    private $volume;
    /**
     * @ORM\ManyToOne(targetEntity="Menage", inversedBy="depots")
     * @ORM\JoinColumn(name="id_menage", referencedColumnName="id")
     */
    private $menage;
      
    /**
     * un dépot est associé à plusieurs contenu
     * @ORM\OneToMany(targetEntity="ContenuDepot", mappedBy="depot", cascade={"persist","remove"},fetch="EAGER")
     */
    private $contenu;
    /**
     *Un déport correspond à un parc
     * @ORM\ManyToOne(targetEntity="Parc")
     * @ORM\JoinColumn(name="id_parc", referencedColumnName="id")
     * @var type 
     */
    private $parc;
    
    public function __construct()
    {
        $this->contenu = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Depot
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idMenage
     *
     * @param integer $idMenage
     *
     * @return Depot
     */
    public function setIdMenage($idMenage)
    {
        $this->idMenage = $idMenage;

        return $this;
    }

    /**
     * Get idMenage
     *
     * @return int
     */
    public function getIdMenage()
    {
        return $this->idMenage;
    }

    /**
     * Set idDechet
     *
     * @param integer $idDechet
     *
     * @return Depot
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
    
    public  function setVolume($volume)
    {
        $this->volume = $volume;
    }
    
    public function getVolume(){
        return $this->volume;
    }
    
    public function getContenu()
    {
        return $this->contenu;
    }
    
    public function setContenu($dechets)
    {
        $this->dechets = contenu;
    }
    
    function getMenage() {
        return $this->menage;
    }

    function setMenage($menage) {
        $this->menage = $menage;
    }

    function getParc() {
        return $this->parc;
    }

    function setParc($parc) {
        $this->parc = $parc;
    }


}

