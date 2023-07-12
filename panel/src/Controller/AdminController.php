<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
	/**
	 * @Route("/admin/dashboard", name="admin_dashboard")
	 */
	public function dashboard(Request $request)
	{
		$user = $this->getUser();

		return $this->render('admin/index/dashboard.html.twig',[
			'user' => $user
		]);
	}
}