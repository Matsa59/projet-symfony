<?php

namespace Cours\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/list")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getRepository("CoursUserBundle:User");

        $listUsers = $em->findAll();

        return array('listUsers' => $listUsers);
    }
}
