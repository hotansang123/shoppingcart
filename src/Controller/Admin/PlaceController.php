<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Place;
use Symfony\Component\HttpFoundation\Request;

class PlaceController extends AbstractController {

    /**
     * @Route("/admin/place/list", name="admin_place_list")
     * @Method({"GET"})
     */
    public function index() {
        $places = $this->getDoctrine()->getRepository(Place::class)->findAll();
        return $this->render('admin/places/list.html.twig', ['places' => $places]);
    }

    /**
     * @Route("/admin/place/create")
     * @Method({"GET"})
     */
    public function create() {
        return $this->render('admin/places/create.html.twig');
    }

    /**
     * @Route("/admin/place/store")
     * Method({"POST"})
     */
    public function store(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $place = new Place();
        $place->setName($request->request->get('place-name'));
        $place->setImage($request->request->get('image'));
        $entityManager->persist($place);
        $entityManager->flush();
        return $this->redirectToRoute('admin_place_list');
    }

    /**
     * @Route("/admin/place/edit/{id}")
     * Method({"GET"})
     */
    public function edit($id) {
        $place = $this->getDoctrine()->getRepository(Place::class)->find($id);
        return $this->render('admin/places/edit.html.twig', ['place' => $place]);
    }
    
    /**
     * @Route("/admin/place/update/{id}")
     * @Method({"POST"})
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $place = $this->getDoctrine()->getRepository(Place::class)->find($id);
        $place->setName($request->request->get('place-name'));
        $place->setImage($request->request->get('image'));
        $entityManager->persist($place);
        $entityManager->flush();
        return $this->redirectToRoute('admin_place_list');
    }

    /**
     * @Route("/admin/place/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete($id) {
        $place = $this->getDoctrine()->getRepository(Place::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($place);
        $entityManager->flush();
        return $this->redirectToRoute('admin_place_list');
    }
}