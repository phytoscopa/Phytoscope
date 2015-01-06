<?php

namespace Phytoscope\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Phytoscope\AppBundle\Entity\Clients;

/**
 * Personne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Phytoscope\AppBundle\Entity\PersonneRepository")
 */
class Personne
{
    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=3)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Phytoscope\AppBundle\Entity\Clients", inversedBy="personnes")
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", length=255, nullable=true)
     */
    private $telFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_portable", type="string", length=255, nullable=true)
     */
    private $telPortable;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="contactQuestionnaire", type="boolean")
     */
    private $contactQuestionnaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Personne
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personne
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
     * @return Personne
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
     * Set client
     *
     * @param \stdClass $client
     * @return Personne
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \stdClass 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set telFixe
     *
     * @param string $telFixe
     * @return Personne
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * Get telFixe
     *
     * @return string 
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set telPortable
     *
     * @param string $telPortable
     * @return Personne
     */
    public function setTelPortable($telPortable)
    {
        $this->telPortable = $telPortable;

        return $this;
    }

    /**
     * Get telPortable
     *
     * @return string 
     */
    public function getTelPortable()
    {
        return $this->telPortable;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Personne
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     * @return Personne
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set contactQuestionnaire
     *
     * @param boolean $contactQuestionnaire
     * @return Personne
     */
    public function setcontactQuestionnaire($contactQuestionnaire)
    {
        $this->contactQuestionnaire = $contactQuestionnaire;

        return $this;
    }

    /**
     * Get contactQuestionnaire
     *
     * @return boolean 
     */
    public function getcontactQuestionnaire()
    {
        return $this->contactQuestionnaire;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return Personne
     */
    public function setnewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean 
     */
    public function getnewsletter()
    {
        return $this->newsletter;
    }
}
