<?php

namespace Vamsii\ToolsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VamsiiToolsBundle:Default:index.html.twig');
    }

    public function ymlAction(Request $request)
    {

            $defaultData = array('yml' => '-  paste yml here');

        $form = $this->createFormBuilder($defaultData)
            ->add('yml', 'textarea', array('label' => 'YAML', 'attr' => array('rows' => '25')))
            
        ->getForm();

         if ($request->isMethod('POST')) {
            $form->bind($request);

            $data = $form->getData();
            $yaml = $data['yml'];

        $parser = new Parser();

try {
    $value = $parser->parse($yaml);
} catch (ParseException $e) {
    return new Response($e->getMessage());
}
                    return new Response("is valid");
        }


 return $this->render('VamsiiToolsBundle:Yml:form.html.twig', array(
            'form' => $form->createView(),
        ));



 	}

}
