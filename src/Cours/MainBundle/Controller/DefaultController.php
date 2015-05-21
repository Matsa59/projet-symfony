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
     * @Route("/list", name="listUser")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getRepository("CoursUserBundle:User");

        $listUsers = $em->findAll();

        return array('listUsers' => $listUsers);
    }

    /**
     * @Route("/list/remove/{id}", name="remove")
     */
    public function listActionRemove($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository("CoursUserBundle:User");

        $user = $repo->find($id);

        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl('listUser'));
    }
}
