<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class IndexController extends Controller
{
	/**
	 * @Route("/", name="index")
	 */
	public function index(Request $request)
	{
	    return $this->redirectToRoute('login');
		return $this->render('index/index.html.twig');
	}
}