<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       // $communes = $container->get(Rest::class)->GetCommunes();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://geoservices.wallonie.be/geolocalisation/rest/getListeCommunes/');
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $communes = $response;
        // replace this example code with whatever you need
        //$this->render('default/index.html.twig', array('communes' => $communes));
        
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        'communes' => $communes]);
    }
}
