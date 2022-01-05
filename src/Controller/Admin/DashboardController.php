<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DashboardController extends AbstractController {

    /**
     * @Route("/admin/dashboard")
     * @Method({"GET"})
     */
    public function index() {
        return $this->render('admin/dashboard/index.html.twig');
    }
}