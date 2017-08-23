<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Assert\Regex(
     *     pattern = "/^[a-z]+$/i",
     *     htmlPattern = "^[a-zA-Z]+$")
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;


     /**
     * @ORM\ManyToOne(targetEntity="Parc", inversedBy="employes")
     * @ORM\JoinColumn(name="id_parc", referencedColumnName="id")
     */
    private $parc;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
     public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set idRole
     *
     * @param integer $idRole
     *
     * @return Utilisateur
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole
     *
     * @return int
     */
    public function getIdRole()
    {
        return $this->idRole;
    }
    
    function getParc() {
        return $this->parc;
    }

    function setParc($parc) {
        $this->parc = $parc;
    }

}

