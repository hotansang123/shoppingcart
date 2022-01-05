<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProductController extends AbstractController {

    /**
     * @Route("/admin/product/list")
     * @Method({"GET"})
     */
    public function index() {
        return $this->render('admin/products/list.html.twig');
    }

    /**
     * @Route("/admin/product/create")
     * @Method({"GET"})
     */
    public function create() {
        return $this->render('admin/products/create.html.twig');
    }
}