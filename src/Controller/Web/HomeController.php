<?php

namespace App\Controller\Web;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class HomeController extends AbstractController {

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index() {
        return $this->render('web/home.html.twig');
    }

    /**
     * @Route("/shop")
     * @Method({"GET"})
     */
    public function shop() {
        return $this->render('web/shop.html.twig');
    }

    /**
     * @Route("/shop-detail")
     * @Method({"GET"})
     */
    public function shopDetail() {
        return $this->render('web/shop-detail.html.twig');
    }

    /**
     * @Route("/shopping-cart")
     * @Method({"GET"})
     */
    public function shoppingCart() {
        return $this->render('web/shopping-cart.html.twig');
    }

    /**
     * @Route("/checkout")
     * @Method({"GET"})
     */
    public function checkout() {
        return $this->render('web/checkout.html.twig');
    }

    /**
     * @Route("/contact")
     * @Method({"GET"})
     */
    public function contact() {
        return $this->render('web/contact.html.twig');
    }
}