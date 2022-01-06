<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends AbstractController {

    /**
     * @Route("/admin/category/list", name="admin_category_list")
     * @Method({"GET"})
     */
    public function index() {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('admin/categories/list.html.twig', ['categories' => $categories]);
    }

    /**
     * @Route("/admin/category/create")
     * @Method({"GET"})
     */
    public function create() {
        return $this->render('admin/categories/create.html.twig');
    }

    /**
     * @Route("/admin/category/store")
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
     * @Route("/admin/category/edit/{id}")
     * Method({"GET"})
     */
    public function edit($id) {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
        return $this->render('admin/categories/edit.html.twig', ['category' => $category]);
    }
    
    /**
     * @Route("/admin/category/update/{id}")
     * @Method({"POST"})
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
        $category->setName($request->request->get('category-name'));
        $category->setImage($request->request->get('image'));
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->redirectToRoute('admin_category_list');
    }

    /**
     * @Route("/admin/category/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete($id) {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($category);
        $entityManager->flush();
        return $this->redirectToRoute('admin_category_list');
    }
}