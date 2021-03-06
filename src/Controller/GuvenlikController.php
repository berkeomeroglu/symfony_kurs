<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GuvenlikController extends Controller
{

    /**
     * @Route("/login", name="login")
     * @throws \Exception
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $sonKullaniciAdi = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $sonKullaniciAdi,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/user-detay")
     */
    public function userDetay()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var User $user */
        $user = $this->getUser();

        return new Response('Kullanıcı detay sayfası, Username:  '. $user->getUsername(). ' Password: '. $user->getPassword(). ' roller: '. implode($user->getRoles()));
    }
}