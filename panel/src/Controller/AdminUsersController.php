<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserEditType;
use App\Form\UserDeleteType;

use \Datetime;

class AdminUsersController extends Controller
{
	/**
	 * @Route("/admin/users", name="admin_users")
	 */
	public function index(Request $request)
	{
		$user = $this->getUser();
		$users = $this
                    ->getDoctrine()
                    ->getRepository(User::class)
                    ->findAll();
                    /*
		              ->findBy([
		              	'isActive' => 0
		              ]);
                    */

		return $this->render('admin/admin-users/index.html.twig',[
			'user' => $user,
			'users' => $users
		]);
	}

	/**
	 * @Route("/admin/users/add", name="admin_users_add")
	 */
	public function add(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		$user = $this->getUser();
		$newUser =  new User();
		$form = $this->createForm(UserType::class, $newUser);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$password = $passwordEncoder->encodePassword($newUser, $newUser->getPlainPassword());
			$newUser->setPassword($password);
			$newUser->setActivateToken(urlencode(base64_encode(random_bytes(25))));
			$newUser->setRegisterDate(new DateTime());
			$newUser->setIsActive(1);

			$requestFields = $request->request->all();

			$roles = [];

			if (array_key_exists('permisAdministrador', $requestFields)) {
                if ($requestFields['permisAdministrador'] == 1) {
                    $roles[] = 'ROLE_ADMIN';
                }
            }

            if (array_key_exists('permisGestorNoticias', $requestFields)) {
                if ($requestFields['permisGestorNoticias'] == 1) {
                    $roles[] = 'ROLE_USER';
                }
            }

			#$roles = explode(',', $newUser->getRoles());
			$newUser->setRoles($roles);

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($newUser);
			$entityManager->flush();

			return $this->redirectToRoute('admin_users');
		}

		return $this->render('admin/admin-users/add.html.twig',[
			'user' => $user,
			'form' => $form->createView()
		]);
	}

	/**
	 * @Route("/admin/users/edit/{id}", name="admin_users_edit")
	 */
	public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder, $id)
	{
		$user = $this->getUser();
		$userEdit = $this->getDoctrine()
		              ->getRepository(User::class)
		              ->find($id);

		$form = $this->createForm(UserEditType::class, $userEdit);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$password = $passwordEncoder->encodePassword($userEdit, $userEdit->getPlainPassword());
			$userEdit->setPassword($password);

            $requestFields = $request->request->all();

            $roles = [];

            if (array_key_exists('permisAdministrador', $requestFields)) {
                if ($requestFields['permisAdministrador'] == 1) {
                    $roles[] = 'ROLE_ADMIN';
                }
            }

            if (array_key_exists('permisGestorNoticias', $requestFields)) {
                if ($requestFields['permisGestorNoticias'] == 1) {
                    $roles[] = 'ROLE_USER';
                }
            }

            $userEdit->setRoles($roles);

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($userEdit);
			$entityManager->flush();

			return $this->redirectToRoute('admin_users');
		}

		$roles = $userEdit->getRoles();

		$isAdmin = in_array('ROLE_ADMIN', $roles);
		$isGestorNoticias = in_array('ROLE_USER', $roles);

		return $this->render('admin/admin-users/edit.html.twig',[
			'user' => $user,
			'userEdit' => $userEdit,
			'isAdmin' => $isAdmin,
			'isGestorNoticias' => $isGestorNoticias,
			'form' => $form->createView()
		]);
	}

	/**
	 * @Route("/admin/users/delete/{id}", name="admin_users_delete")
	 */
	public function delete(Request $request, $id)
	{
	    /*
		$user = $this->getUser();
		$userDelete = $this->getDoctrine()
		                 ->getRepository(User::class)
		                 ->find($id);

		$form = $this->createForm(UserDeleteType::class, $userDelete);
		$form->handleRequest($request);


		if ($form->isSubmitted()) {
			$userDelete->setisDeleted(1);

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($userDelete);
			$entityManager->flush();

			return $this->redirectToRoute('admin_users');
		}


		return $this->render('admin/admin-users/delete.html.twig',[
			'user' => $user,
			'userDelete' => $userDelete,
			'form' => $form->createView()
		]);
	    */
	}

    /**
     * @Route("/admin/users/activate-deactivate/{id}", name="admin_users_activate_deactivate")
     */
	public function activateDeactivate(Request $request, $id)
    {
        $userActivateDeactivate = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $currentStatus = $userActivateDeactivate->getIsActive();
        $userActivateDeactivate->setIsActive(!$currentStatus);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($userActivateDeactivate);
        $entityManager->flush();

        return $this->redirectToRoute('admin_users');
    }
}