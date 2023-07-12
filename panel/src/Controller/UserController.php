<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
	/**
	 * @Route("/user/dashboard", name="user_dashboard")
	 */
	public function dashboard(Request $request)
	{
		$user = $this->getUser();

		return $this->render('user/index/dashboard.html.twig',[
			'user' => $user
		]);
	}
}