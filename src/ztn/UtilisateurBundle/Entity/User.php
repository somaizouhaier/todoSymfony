<?php

namespace ztn\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Utilisateur
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ztn\UtilisateurBundle\Entity\UtilisateurRepository")
 */
class User extends BaseUser {

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=255, nullable=true)
     */
    protected $emailCanonical;
    
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, nullable=true)
     */
    protected $usernameCanonical;

    /**
     * @var boolean
     * @ORM\Column(name="etat_activation", type="boolean", nullable=true)
     */
    protected $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", nullable=true)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     */
    protected $password;


    /**
     * @var boolean
     * 
     * @ORM\Column(name="locked", type="boolean", nullable=true)
     */
    protected $locked;


    /**
     * @var array
     * 
     * @ORM\Column(name="roles", type="array")
     */
    protected $roles;



    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $utilisateurNom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable = true)
     */
    private $utilisateurPrenom;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_naissance", type="date", nullable = true)
     */
    private $utilisateurDateNaissance;
    
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="ztn\TodoBundle\Entity\Event", mappedBy="user",cascade={"persist","remove"})
     * */
    private $Events;


    
    public function __construct() {
        parent::__construct();
        $this->setRoles(array('ROLE_USER'));
    }


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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        $this->username = $email;

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
     * Set emailCanonical
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string 
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Set locked
     *
     * @param boolean $locked
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
            
        }

        return $this;
    }
    
    public function addRole($role) {
        $role = strtoupper($role);
     /*   if ($role === static::ROLE_DEFAULT) {
            var_dump($role);exit();
            return $this;
        }*/

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
            
        }

        return $this;
    }


    /**
     * Set utilisateurNom
     *
     * @param string $utilisateurNom
     * @return User
     */
    public function setUtilisateurNom($utilisateurNom)
    {
        $this->utilisateurNom = $utilisateurNom;

        return $this;
    }

    /**
     * Get utilisateurNom
     *
     * @return string 
     */
    public function getUtilisateurNom()
    {
        return $this->utilisateurNom;
    }

    /**
     * Set utilisateurPrenom
     *
     * @param string $utilisateurPrenom
     * @return User
     */
    public function setUtilisateurPrenom($utilisateurPrenom)
    {
        $this->utilisateurPrenom = $utilisateurPrenom;

        return $this;
    }

    /**
     * Get utilisateurPrenom
     *
     * @return string 
     */
    public function getUtilisateurPrenom()
    {
        return $this->utilisateurPrenom;
    }

    /**
     * Set utilisateurDateNaissance
     *
     * @param \DateTime $utilisateurDateNaissance
     * @return User
     */
    public function setUtilisateurDateNaissance($utilisateurDateNaissance)
    {
        $this->utilisateurDateNaissance = $utilisateurDateNaissance;

        return $this;
    }

    /**
     * Get utilisateurDateNaissance
     *
     * @return \DateTime 
     */
    public function getUtilisateurDateNaissance()
    {
        return $this->utilisateurDateNaissance;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     * @return User
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string 
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Add Events
     *
     * @param \ztn\TodoBundle\Entity\Event $events
     * @return User
     */
    public function addEvent(\ztn\TodoBundle\Entity\Event $events)
    {
        $this->Events[] = $events;

        return $this;
    }

    /**
     * Remove Events
     *
     * @param \ztn\TodoBundle\Entity\Event $events
     */
    public function removeEvent(\ztn\TodoBundle\Entity\Event $events)
    {
        $this->Events->removeElement($events);
    }

    /**
     * Get Events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->Events;
    }
}
