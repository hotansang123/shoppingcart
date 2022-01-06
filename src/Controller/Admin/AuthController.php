<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AuthController extends AbstractController {

    /**
     * @Route("/admin/login")
     * @Method({"GET"})
     */
    public function showFormLogin() {
        return $this->render('admin/login.html.twig');
    }

    /**
     * @Route("/admin/post-login")
     * @Method({"POST"})
     */
    public function postLogin(Request $request, SessionInterface $session) {
        $admins = $this->getDoctrine()->getRepository(Admin::class)->findAll();
        foreach ($admins as $admin) {
            if ($admin->getEmail() == $request->request->get('email') && $admin->getPassword() == md5($request->request->get('password'))) {
                $session->set('admin_login', 1);
                return $this->redirectToRoute('admin_dashboard');
            }
        }
        return $this->redirectToRoute('admin_auth_login');
    }

    /**
     * @Route("/admin/logout")
     * @Method({"GET"})
     */
    public function logout() {
        return $this->redirectToRoute('admin_auth_login');
    }
}