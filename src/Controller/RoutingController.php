<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RoutingController extends AbstractController
{
    /**
     * @Route({
     *  "en": "/about",
     *   "tr": "/hakkinda"
     * }, name="about")
     * @return Response
     */
    public function hakkinda()
    {

        return new JsonResponse(['message' => 'Hakkında Sayfası']);
//        return $this->render("index/index.html.twig", [
//            'controller_name' => 'indexController'
//        ]);
    }

    /**
     * @Route("/blog/{page}", name="blog_listele", requirements={"page"="\d+"})
     */
    public function listele($page)
    {
        return new Response('Sayfa: '. $page);
    }

    /**
     * @Route("/blog/{postSlug}", name="blog_listele_2", requirements={"page" = "\d+"})
     */
    public function listeleWithSlug($postSlug)
    {
        return new Response("Post Slug: ". $postSlug);
    }

    /**
     * @Route("/routing/hello/{_locale}", defaults={"_locale"="tr"}, requirements={
     "_locale"="en|tr"
*     })
     */
    public function helloRouting($_locale)
    {
        return new Response("Locale is:". $_locale);
    }

    /**
     * @Route("/api/posts/{id}", methods={"GET", "HEAD"})
     */
    public function showPage($id)
    {
        return new JsonResponse(['message' => $id]);
    }

    /**
     * @Route("/posts/{page}", name="post_listele", requirements={"page"="\d+"})
     */
    public function postListeleme($page)
    {
        return new JsonResponse(["message" => $page]);
    }

    /**
     * @Route("/posts-listele/{page<\d+>?5}")
     */
    public function postListeleme2($page)
    {
        return new JsonResponse(['message' => $page]);
    }

    /**
     * @Route("/makeleler/{_locale}/{yil}/{slug}.{_format}",
     *     name="makale-goster",
     *     defaults={"_format": "html"},
     *     requirements={
     "_locale": "en|tr",
     *     "_format": "html|json",
     *         "yil": "\d+"
     *})
     * @return JsonResponse
     */
    public function showMakale($_locale, $yil, $slug, $_format)
    {
        return new JsonResponse([
           'message' => implode("--", [
               $_locale,$yil,$slug,$_format
           ])
        ]);
    }

    /**
     * @Route("/generate-url")
     */
    public function urlUret()
    {
        $url = $this->generateUrl("makale-goster", [
           '_locale' => 'en',
            '_format' => 'html',
            'yil' => 1990,
            'slug' => 'kaliteli-hizmet-nasil-verilir'
        ]);

        return new JsonResponse(['url' => $url]);
    }

    /**
     * @Route("/generate-url-servis")
     */
    public function urlUret2(UrlGeneratorInterface $router)
    {
        $url = $router->generate("makale-goster", [
            '_locale' => 'en',
            '_format' => 'html',
            'yil' => 1990,
            'slug' => 'kaliteli-hizmet-nasil-verilir'
        ]);

        return new JsonResponse(["url" => $url]);
    }
}
