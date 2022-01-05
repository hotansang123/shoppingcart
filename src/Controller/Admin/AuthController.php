<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AuthController extends AbstractController {

    /**
     * @Route("/admin/login")
     * @Method({"GET"})
     */
    public function showFormLogin() {
        return $this->render('admin/login.html.twig');
    }
}