<?php


namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Item;


class ItemController extends Controller
{

    /**
     * @Route ("/add")
     */

    public function addItemAction(Request $request)
    {
        $item = new Item();

        $form = $this->createFormBuilder($item)
            ->add('item_name', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('price',NumberType::class, array('scale'=>2,'attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('quantity', IntegerType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('release_date', DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('expiration_date', DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('submit', SubmitType::class, array('attr' => array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted())
        {
            $item_name = $form['item_name']->getData();
            $price = $form['price']->getData();
            $quantity = $form['quantity']->getData();
            $release_date = $form['release_date']->getData();
            $expiration_date = $form['expiration_date']->getData();

            $item->setItemName($item_name);
            $item->setPrice($price);
            $item->setQuantity($quantity);
            $item->setReleaseDate($release_date);
            $item->setExpirationDate($expiration_date);

            $em = $this->getDoctrine()->getManager();

            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('storage_keeper_dashboard');

        }


        return $this->render('items/add_item_page.html.twig', array('form' => $form->createView()));
    }



}