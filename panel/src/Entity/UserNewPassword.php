<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use \Datetime;

/**
 * @ORM\Table(name="users_new_password")
 * @ORM\Entity(repositoryClass="App\Repository\NewUserPasswordRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class UserNewPassword
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=254, nullable=true)
	 */
	private $token;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="user_new_password")
	 * @ORM\JoinColumn(nullable=true)
	 */
	private $user;


	/** @ORM\Column(type="datetime") */
	private $generated;

	public function __construct()
	{
		$this->generated = new DateTime();
	}

	/**
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}

	/**
	 * @param mixed $user
	 *
	 * @return UserNewPassword
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
	}

	/**
	 * @return mixed
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param mixed $newPasswordToken
	 *
	 * @return UserNewPassword
	 */
	public function setToken( $token ) {
		$this->token = $token;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGenerated() {
		return $this->generated;
	}

	/**
	 * @param mixed $generated
	 *
	 * @return UserNewPassword
	 */
	public function setGenerated( $generated ) {
		$this->generated = $generated;

		return $this;
	}
}
