<?php

namespace ztn\TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="EVENT")
 * @ORM\Entity(repositoryClass="ztn\TodoBundle\Entity\EventRepository")
 */
class Event
{
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    protected $etat;
    


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
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * @var user
     * @ORM\ManyToOne(targetEntity="ztn\UtilisateurBundle\Entity\User" ,inversedBy="events")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="user_id", nullable=false)
     * 
     */
    private $user;

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user
     *
     * @param \ztn\UtilisateurBundle\Entity\User $user
     * @return Event
     */
    public function setUser(\ztn\UtilisateurBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ztn\UtilisateurBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Event
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
