<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AuthController extends AbstractController {

    /**
     * @Route("/login")
     * @Method({"GET"})
     */
    public function showFormLogin() {
        return $this->render('web/login.html.twig');
    }

    /**
     * @Route("/register")
     * @Method({"GET"})
     */
    public function showFormRegister() {
        return $this->render('web/register.html.twig');
    }
}