<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ErrorsController extends Controller
{
    public function accessDeniedAction()
    {
        return $this->render('AppBundle:Errors:error403.html.twig', array(
            // ...
        ));
    }

}
