<?php

namespace Hypersites\MonicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="monica_default_index")
     * @Template("HypersitesMonicaBundle:default:index.html.twig")
     */
    public function indexAction()
    {
       // die('found');

        return array();
    }
}
