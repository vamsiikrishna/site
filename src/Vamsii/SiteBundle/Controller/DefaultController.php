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


 $message = \Swift_Message::newInstance()
        ->setSubject('Deploy')
        ->setFrom('vamsi@vamsii.com')
        ->setTo('plutonium.vamsi@gmail.com')
        ->setBody('Please login to your server and do a git pull')
    ;
    $this->get('mailer')->send($message);



    				$response = new Response();
    				$response->setContent("Please Deploy");
    				$response->setStatusCode(200);
    				$response->headers->set('Content-Type', 'text/html');
    				return $response;
    			}
    			else {
    				return $this->render('VamsiiSiteBundle:Default:index.html.twig');

    			}
    }
}
