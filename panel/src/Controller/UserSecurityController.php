<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Translation\TranslatorInterface;

use App\Form\UserType;
use App\Form\UserEditType;
use App\Form\UserForgotPasswordType;
use App\Form\UserChangePasswordType;
use App\Entity\User;
use App\Entity\UserNewPassword;

use \Datetime;

class UserSecurityController extends Controller
{
	/**
	 * @Route("/login", name="login")
	 */
	public function login(Request $request, AuthenticationUtils $authenticationUtils)
	{
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		$form = $this->createForm(UserType::class);


		return $this->render('user_security/login.html.twig',[
			'project_name' => $this->getParameter('project_name'),
			'last_username' => $lastUsername,
			'error' => $error,
			'form' => $form->createView()
		]);
	}

	/**
	 * @Route("/login_switch", name="login_switch")
	 */
	public function loginSwitch()
	{
		$user = $this->getUser();

		if (!$user) {
			return $this->redirectToRoute('noticias_mis_noticias');
		}

		foreach ($user->getRoles() as $role) {
			if ($role == 'ROLE_ADMIN') {
				return $this->redirectToRoute('administrar_noticias');
			}
		}

		return $this->redirectToRoute('noticias_mis_noticias');
	}

	/**
	 * @Route("/register", name="registration")
	 */
	public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailer, TranslatorInterface $translator)
	{
		$user = new User();
		$form = $this->createForm(UserType::class, $user);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
			$user->setPassword($password);
			$user->setActivateToken(urlencode(base64_encode(random_bytes(25))));
			$user->setRegisterDate(new DateTime());

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();


			$message = (new \Swift_Message('['.$this->getParameter('project_name').'] '.$translator->trans('Bienvenido a').' '.$this->getParameter('project_name').' '.$translator->trans('y activación de tu cuenta')))
				->setFrom($this->getParameter('from_email'))
				->setTo($user->getEmail())
				->setBody(
					$this->renderView(
						'emails/user_security/register.html.twig',
						[
							'project_name' => $this->getParameter('project_name'),
							'username' => $user->getUsername(),
							'activateToken' => $user->getActivateToken()
 						]
					),
					'text/html'
				);

			$mailer->send($message);

			return $this->redirectToRoute('login_switch');
		}

		return $this->render(
			'user_security/register.html.twig',[
				'form' => $form->createView()
			]
		);
	}

	/**
	 * @Route("/activate-account/{activateToken}", name="activate_account")
	 */
	public function activate_account($activateToken, TranslatorInterface $translator){
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();
		$userRepo = $doctrine->getRepository(User::class);
		$user = $userRepo->findOneByActivateToken($activateToken);

		if ($user->getIsActive()){
			throw $this->createNotFoundException(
				$translator->trans('Your user account has been previously active')
			);
		} else {
			$user->setIsActive(true);
			$user->setActivateDate(new DateTime());
		}

		$em->persist($user);
		$em->flush();

		return $this->redirectToRoute('login');
	}

	/**
	 * @Route("/new-password", name="new_password")
	 */
	public function newPassword(Request $request, \Swift_Mailer $mailer, TranslatorInterface $translator)
	{
		$form = $this->createForm(UserForgotPasswordType::class);
		$form->handleRequest($request);

		$message = '';

		if ($form->isSubmitted() && $form->isValid()) {
		    $username = $form->get('username')->getData();

			$doctrine = $this->getDoctrine();
			$userRepo = $doctrine->getRepository(User::class);
		    $rememberUser = $userRepo->loadUserByUsername($username);

		    if ($rememberUser) {
			    $em = $doctrine->getManager();

			    $userNewPasswordRepo = $doctrine->getRepository(UserNewPassword::class);
			    $rememberTokens = $userNewPasswordRepo->findByUser($rememberUser);

			    foreach ($rememberTokens as $rememberToken) {
			    	$em->remove($rememberToken);
			    }

			    $em->flush();

		    	$userNewPassword = new UserNewPassword();
			    $userNewPassword->setUser($rememberUser);
			    $userNewPassword->setToken(urlencode(base64_encode(random_bytes(25))));

			    $em->persist($userNewPassword);
			    $em->flush();

                $message = (new \Swift_Message('['.$this->getParameter('project_name').'] '.$translator->trans('Tu nueva contraseña')))
                    ->setFrom($this->getParameter('from_email'))
                    ->setTo($rememberUser->getEmail())
                    ->setBody(
                        $this->renderView(
                            'emails/user_security/new_password.html.twig',
                            [
	                            'project_name' => $this->getParameter('project_name'),
                            	'username' => $rememberUser->getUsername(),
	                            'token' => $userNewPassword->getToken()
                            ]
                        ),
	                    'text/html'
                    );

                $mailer->send($message);
            }

            $message = $translator->trans('Hemos enviado un correo electrónico al email del usuario').' '.$username.'<br />'.$translator->trans('Revise su correo electrónico para restablecer su contraseña.') ;
		}

		return $this->render('user_security/new_password.html.twig',[
			'form' => $form->createView(),
			'message' => $message
		]);
	}

	/**
	 * @Route("/change-password/{token}", name="change_password")
	 */
	public function changePasswordUrl(Request $request, $token, UserPasswordEncoderInterface $passwordEncoder) {
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();

		$userNewPasswordRepo = $doctrine->getRepository(UserNewPassword::class);
		$rememberToken = $userNewPasswordRepo->findOneByToken($token);

		if (!$rememberToken) {
			throw $this->createNotFoundException(
				'No '.$token.' token'
			);
		}

		$form = $this->createForm(UserChangePasswordType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$formData = $form->getData();
			$user = $rememberToken->getUser();

			$password = $passwordEncoder->encodePassword($user, $formData['plainPassword']);
			$user->setPassword($password);

			$em->persist($user);
			$em->remove($rememberToken);
			$em->flush();

			return $this->redirectToRoute('login');
		}

		return $this->render('user_security/change_password.html.twig',[
			'form' => $form->createView()
		]);
	}

	/**
	 * @Route("/cancel-change-password/{token}", name="cancel_change_password")
	 */
	public function cancelChangePassword ($token) {
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();

		$userNewPasswordRepo = $doctrine->getRepository(UserNewPassword::class);
		$rememberToken = $userNewPasswordRepo->findOneByToken($token);

		if (!$rememberToken) {
			throw $this->createNotFoundException(
				'No '.$token.' token'
			);
		}

		$em->remove($rememberToken);
		$em->flush();

		return $this->redirectToRoute('login');
	}

	/**
	 * @Route("/user/edit-profile", name="edit_profile")
	 */
	public function edit_profile(Request $request, UserPasswordEncoderInterface $passwordEncoder){
		$user = $this->getUser();

		if (!$user) {
			return $this->redirectToRoute('login');
		}

		$user = $this->getUser();
		$form = $this->createForm(UserEditType::class, $user);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$formData = $form->getData();

			$doctrine = $this->getDoctrine();
			$em = $doctrine->getManager();

			$userRepo = $doctrine->getRepository(User::class);
			$user = $userRepo->findOneById($user->getId());

			$password = $passwordEncoder->encodePassword($user, $formData->getPlainPassword());
			$user->setPassword($password);

			$em->persist($user);
			$em->flush();
		}

		return $this->render('user_security/edit_profile.html.twig',[
			'user' => $user,
			'form' => $form->createView()
		]);
	}
}