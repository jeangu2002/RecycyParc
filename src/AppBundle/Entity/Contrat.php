<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratRepository")
 */
class Contrat
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
     * @ORM\Column(name="idParc", type="integer")
     */
    private $idParc;

    /**
     * @var string
     *
     * @ORM\Column(name="idUtilisateur", type="integer")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="dateEmbauche", type="date")
     */
    private $dateEmbauche;
    
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
     * Set idParc
     *
     * @param integer $idParc
     *
     * @return Contrat
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
     * Set idUtilisateur
     *
     * @param string $idUtilisateur
     *
     * @return Contrat
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return string
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}

