<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryController extends AbstractController {

    /**
     * @Route("/admin/category/list")
     * @Method({"GET"})
     */
    public function index() {
        return $this->render('admin/categories/list.html.twig');
    }

    /**
     * @Route("/admin/category/create")
     * @Method({"GET"})
     */
    public function create() {
        return $this->render('admin/categories/create.html.twig');
    }
}