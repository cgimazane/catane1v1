<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle/Entity/Plateau;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 * @Template
	 */
	public function indexAction()
	{
		$partieRepository = $this->getDoctrine()->getRepository('AppBundle:Partie');
		$parties = $partieRepository->findAll();
		
		//$this->container->get('app.initiate')->test();
		
				$plateau = new Plateau();

	return array( 'parties' => $parties );
	}
}
