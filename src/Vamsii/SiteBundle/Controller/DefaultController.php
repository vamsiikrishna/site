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
    				shell_exec("git pull");



$message = \Swift_Message::newInstance()
        ->setSubject('Deplouyed')
        ->setFrom('vamsi@vamsii.com')
        ->setTo('vamsi@vamsii.com')
        ->setBody('Deployed')
    ;
    $this->get('mailer')->send($message);



    				$response = new Response();
    				$response->setContent("<html><body><h1>Deployed</h1></body></html>");
    				$response->setStatusCode(200);
    				$response->headers->set('Content-Type', 'text/html');
    				return $response;
    			}
    			else {
    				return $this->render('VamsiiSiteBundle:Default:index.html.twig');

    			}
    }
}
