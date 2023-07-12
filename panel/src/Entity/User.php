<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface, \Serializable
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=25, unique=true)
	 */
	private $username;

	/**
	 * @Assert\NotBlank()
	 * @Assert\Length(max=4096)
	 */
	private $plainPassword;

	/**
	 * @ORM\Column(type="string", length=64)
	 */
	private $password;

	/**
	 * @ORM\Column(type="string", length=254, unique=true)
	 */
	private $email;

	/**
	 * @ORM\Column(type="string", length=254, nullable=true)
	 */
	private $roles;

	/**
	 * @ORM\Column(name="is_active", type="boolean", options={"default" : 0})
	 */
	private $isActive = 0;

    /**
     * @ORM\Column(name="is_blocked", type="boolean", options={"default" : 0})
     */
    private $isBlocked = 0;

	/**
	 * @ORM\Column(type="string", length=254, nullable=true)
	 */
	private $activateToken;

	/** @ORM\Column(type="datetime", nullable=true) */
	private $registerDate;

	/** @ORM\Column(type="datetime", nullable=true) */
	private $activateDate;

	/** @ORM\Column(type="datetime", nullable=true) */
	private $lastLoginDate;

	public function __construct()
	{
		// may not be needed, see section on salt below
		// $this->salt = md5(uniqid('', true));
	}

	public function getId()
	{
		return $this->id;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getPlainPassword()
	{
		return $this->plainPassword;
	}

	public function setPlainPassword($password)
	{
		$this->plainPassword = $password;
	}

	public function getSalt()
	{
		// you *may* need a real salt depending on your encoder
		// see section on salt below
		return null;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getisBlocked()
    {
        return $this->isBlocked;
    }

    /**
     * @param mixed $isBlocked
     * @return User
     */
    public function setIsBlocked($isBlocked)
    {
        $this->isBlocked = $isBlocked;
        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getActivateToken() {
		return $this->activateToken;
	}

	/**
	 * @param mixed $activateToken
	 *
	 * @return User
	 */
	public function setActivateToken( $activateToken ) {
		$this->activateToken = $activateToken;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRegisterDate() {
		return $this->registerDate;
	}

	/**
	 * @param mixed $registerDate
	 *
	 * @return User
	 */
	public function setRegisterDate( $registerDate ) {
		$this->registerDate = $registerDate;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastLoginDate() {
		return $this->lastLoginDate;
	}

	/**
	 * @param mixed $lastLoginDate
	 *
	 * @return User
	 */
	public function setLastLoginDate( $lastLoginDate ) {
		$this->lastLoginDate = $lastLoginDate;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getActivateDate() {
		return $this->activateDate;
	}

	/**
	 * @param mixed $activateDate
	 *
	 * @return User
	 */
	public function setActivateDate( $activateDate ) {
		$this->activateDate = $activateDate;

		return $this;
	}

    /**
     * @param mixed $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = json_encode($roles);

        return $this;
    }

	public function getRoles()
	{
        if (!$this->getisActive()) {
            return [];
        } elseif (trim($this->roles) == '' or is_null($this->roles)) {
            return ['ROLE_USER'];
        } else {
            return json_decode($this->roles);
        }
	}

	public function eraseCredentials()
	{
	}

	/** @see \Serializable::serialize() */
	public function serialize()
	{
		return serialize(array(
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt,
		));
	}

	/** @see \Serializable::unserialize() */
	public function unserialize($serialized)
	{
		list (
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt
			) = unserialize($serialized);
	}
}