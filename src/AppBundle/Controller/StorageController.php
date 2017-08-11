<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Item;

class StorageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */

    public function indexAction()
    {

        return $this->render('index.html.twig');
    }

    /**
     * @Route ("/seller", name = "seller_dashboard")
     * @Method("GET")
     */

    public function sellerAction()
    {
        $em = $this->getDoctrine();
        $items = $em->getRepository('AppBundle:Item')->findAll();


        return $this->render('dashboard/seller.dashboard.html.twig', array('items' => $items));
    }

    /**
     * @Route ("/storage_keeper", name = "storage_keeper_dashboard")
     * @Method("GET")
     */

    public function storageKeeperAction()
    {
        return $this->render('dashboard/storage_keeper.dashboard.html.twig');
    }

}
