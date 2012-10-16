<?php

namespace Vamsii\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VamsiiSiteBundle:Default:index.html.twig');
    }
}
