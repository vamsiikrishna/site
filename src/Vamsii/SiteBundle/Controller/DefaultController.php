<?php

namespace Vamsii\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VamsiiSiteBundle:Default:index.html.twig');
    }

    public function pullAction()
    {
    			$request = $this->getRequest();
    			if ($request->getMethod() == 'POST') {

    				$hosted_dir = $this->container->getParameter('hosted_dir');
    				chdir($hosted_dir);
    				$resp = shell_exec("git pull");
    				$response = new Response();
    				$response->setContent("$resp");
    				$response->setStatusCode(200);
    				$response->headers->set('Content-Type', 'text/html');
    				return $response;
    			}
    			else {
    				return $this->render('VamsiiSiteBundle:Default:index.html.twig');

    			}
    }
}
