<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_page")
     */

    public function loginAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('name', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('password', PasswordType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('submit', SubmitType::class, array('attr' => array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted())
        {
            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/login.page.html.twig', array('form' => $form->createView()));
    }

}