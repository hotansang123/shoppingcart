<?php

namespace App\Controller\Web;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Category;
use App\Entity\Place;
use App\Entity\Product;
use Doctrine\ORM\Query\Expr\Join;

class HomeController extends AbstractController {

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $places = $this->getDoctrine()->getRepository(Place::class)->findAll();
        return $this->render('web/home.html.twig',['categories' => $categories, 'places' => $places]);
    }

    /**
     * @Route("/shop")
     * @Method({"GET"})
     */
    public function shop() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/shop.html.twig',['categories' => $categories]);
    }

    /**
     * @Route("/shop-detail")
     * @Method({"GET"})
     */
    public function shopDetail() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/shop-detail.html.twig',['categories' => $categories]);
    }

    /**
     * @Route("/shopping-cart")
     * @Method({"GET"})
     */
    public function shoppingCart() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/shopping-cart.html.twig',['categories' => $categories]);
    }

    /**
     * @Route("/checkout")
     * @Method({"GET"})
     */
    public function checkout() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/checkout.html.twig',['categories' => $categories]);
    }

    /**
     * @Route("/contact")
     * @Method({"GET"})
     */
    public function contact() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/contact.html.twig',['categories' => $categories]);
    }

    public function shopProductCategory($id)
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findByCategoryIdField($id);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('web/shop.html.twig',['categories' => $categories, 'products' => $products]);
    }
}