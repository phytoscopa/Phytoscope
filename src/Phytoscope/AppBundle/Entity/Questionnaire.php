<?php

namespace Phytoscope\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Questionnaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Phytoscope\AppBundle\Entity\QuestionnaireRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Questionnaire
{
    public function __construct()
    {
        $this->personnes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return "questionnaire";
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
    * @ORM\OneToOne(targetEntity="Phytoscope\AppBundle\Entity\Clients", mappedBy="questionnaire")
    */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="envoyeLe", type="date")
     */
    private $envoyeLe;

    /**
     * @var string
     *
     * @ORM\Column(name="obtenuReponse", type="boolean")
     */
    private $obtenuReponse;

    /**
     * @var string
     *
     * @ORM\Column(name="qBotaniste", type="boolean")
     * @Assert\NotBlank()
     */
    private $qBotaniste;

    /**
     * @var string
     *
     * @ORM\Column(name="qNbBotanistes", type="string", length=255, nullable=true)
     * @Assert\Choice(callback = "getListeValeursBotanistesValidation")
     */
    private $qNbBotanistes;

    /**
     * @var string
     *
     * @ORM\Column(name="qTypeEtudes", type="string", length=255)
     */
    private $qTypeEtudes;

    /**
    * 
    * @ORM\OneToMany(targetEntity="Phytoscope\AppBundle\Entity\Personne", mappedBy="client", cascade={"persist"})
    */
    private $personnes;

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
     * Set qBotaniste
     *
     * @param string $qBotaniste
     * @return Questionnaire
     */
    public function setQBotaniste($qBotaniste)
    {
        $this->qBotaniste = $qBotaniste;

        return $this;
    }

    /**
     * Get qBotaniste
     *
     * @return string 
     */
    public function getQBotaniste()
    {
        return $this->qBotaniste;
    }

    /**
     * Set qNbBotanistes
     *
     * @param string $qNbBotanistes
     * @return Questionnaire
     */
    public function setQNbBotanistes($qNbBotanistes)
    {
        $this->qNbBotanistes = $qNbBotanistes;

        return $this;
    }

    /**
     * Get qNbBotanistes
     *
     * @return string 
     */

    public function getQNbBotanistes()
    {
        return $this->qNbBotanistes;
    }

    public static function getListeValeursBotanistes()
    {
        return array(null => 'Pas d\'estimation','1' => '1', '1-5' => '1-5', '5-10' => '5-10', '+10' => '+ de 10');
    }

    public static function getListeValeursBotanistesValidation()
    {
        return array(null, '1', '1-5', '5-10', '+10');
    }

    /**
     * Set qTypeEtudes
     *
     * @param string $qTypeEtudes
     * @return Questionnaire
     */
    public function setQTypeEtudes($qTypeEtudes)
    {
        $this->qTypeEtudes = $qTypeEtudes;

        return $this;
    }

    /**
     * Get qTypeEtudes
     *
     * @return string 
     */
    public function getQTypeEtudes()
    {
        return $this->qTypeEtudes;
    }

    /**
     * Set envoyeLe
     *
     * @param \DateTime $envoyeLe
     * @return Questionnaire
     */
    public function setEnvoyeLe($envoyeLe)
    {
        $this->envoyeLe = $envoyeLe;

        return $this;
    }

    /**
     * Get envoyeLe
     *
     * @return \DateTime 
     */
    public function getEnvoyeLe()
    {
        return $this->envoyeLe;
    }

    /**
     * Set obtenuReponse
     *
     * @param boolean $obtenuReponse
     * @return Questionnaire
     */
    public function setObtenuReponse($obtenuReponse)
    {
        $this->obtenuReponse = $obtenuReponse;

        return $this;
    }

    /**
     * Get obtenuReponse
     *
     * @return boolean 
     */
    public function getObtenuReponse()
    {
        return $this->obtenuReponse;
    }

    /**
    * Set Client
    * @param \Phytoscope\AppBundle\Entity\Clients $client
    * @return Questionnaire
    */
    public function setClient(\Phytoscope\AppBundle\Entity\Clients $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
    * Get Client
    *
    * @return \Phytoscope\AppBundle\Entity\Clients
    */
    public function getClient()
    {
        return $this->client;
    }

    /**
    * @ORM\PrePersist
    */
    public function setRempliQuestionnaire()
    {
            $this->envoyeLe = new \DateTime();
            $this->obtenuReponse = true;
            $this->qTypeEtudes = 'aa';

    }

    /**
    * Add personnes
    *
    * @param Phytocope\AppBundle\Entity\Personne $personnes
    */
    public function addPersonne(\Phytoscope\AppBundle\Entity\Personne $personne)
    {
        $this->personnes[] = $personne;
    }
 
    /**
    * Remove personnes
    *
    * @param Phytoscope\AppBundle\Entity\Categorie $categories
    */
    public function removePersonne(\Phytoscope\AppBundle\Entity\Personne $personne)
    {
        $this->personnes->removeElement($personne);
    }
 
    /**
      * Get personnes
      *
      * @return Doctrine\Common\Collections\Collection
      */
    public function getPersonnes()
    {
        return $this->personnes;
    }
}
