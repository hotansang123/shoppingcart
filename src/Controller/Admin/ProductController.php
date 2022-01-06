<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Product;
use App\Entity\Category;
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
        return $this->render('admin/products/create.html.twig', ['categories' => $categories]);
    }

    /**
     * @Route("/admin/product/store")
     * Method({"POST"})
     */
    public function store(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $category = new Category();
        $category->setName($request->request->get('category-name'));
        $category->setImage($request->request->get('image'));
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->redirectToRoute('admin_category_list');
    }

    /**
     * @Route("/admin/product/edit/{id}")
     * Method({"GET"})
     */
    public function edit($id) {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('admin/categories/edit.html.twig', ['product' => $product, 'categories' => $categories]);
    }
    
    /**
     * @Route("/admin/product/update/{id}")
     * @Method({"POST"})
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $product->setName($request->request->get('name'));
        $product->setImage($request->request->get('image'));
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