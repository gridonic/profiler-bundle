<?php

namespace Gridonic\ProfilerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GridonicProfilerBundle:Default:index.html.twig');
    }
}
