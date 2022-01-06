<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Place;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController {

    /**
     * @Route("/admin/product/list")
     * @Method({"GET"})
     */
    public function index() {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('admin/products/list.html.twig',['products' => $products]);
    }

    /**
     * @Route("/admin/product/create")
     * @Method({"GET"})
     */
    public function create() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $places = $this->getDoctrine()->getRepository(Place::class)->findAll();
        return $this->render('admin/products/create.html.twig', ['categories' => $categories, 'places' => $places]);
    }

    /**
     * @Route("/admin/product/store")
     * Method({"POST"})
     */
    public function store(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Product();
        $product->setName($request->request->get('title'));
        $product->setImage($request->request->get('image'));
        $product->setQty($request->request->get('quantity'));
        $product->setDescription($request->request->get('content'));
        $product->setCategoryId($request->request->get('category_id'));
        $product->setPlaceId($request->request->get('place_id'));
        $product->setPrice($request->request->get('price'));
        $entityManager->persist($product);
        $entityManager->flush();
        return $this->redirectToRoute('admin_product_list');
    }

    /**
     * @Route("/admin/product/edit/{id}")
     * Method({"GET"})
     */
    public function edit($id) {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $places = $this->getDoctrine()->getRepository(Place::class)->findAll();
        return $this->render('admin/products/edit.html.twig', ['product' => $product, 'categories' => $categories, 'category_id' => $product->getCategoryId(), 'place_id' => $product->getPlaceId(), 'places' => $places]);
    }
    
    /**
     * @Route("/admin/product/update/{id}")
     * @Method({"POST"})
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $product->setName($request->request->get('title'));
        $product->setImage($request->request->get('image'));
        $product->setQty($request->request->get('quantity'));
        $product->setDescription($request->request->get('content'));
        $product->setCategoryId($request->request->get('category_id'));
        $product->setPlaceId($request->request->get('place_id'));
        $product->setPrice($request->request->get('price'));
        $entityManager->persist($product);
        $entityManager->flush();
        return $this->redirectToRoute('admin_product_list');
    }

    /**
     * @Route("/admin/product/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete($id) {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        return $this->redirectToRoute('admin_product_list');
    }
}