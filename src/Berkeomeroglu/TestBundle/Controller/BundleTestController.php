<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-19
 * Time: 16:21
 */

namespace App\Berkeomeroglu\TestBundle\Controller;


use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BundleTestController extends Controller
{
    /**
     * @Route("/bundle-test/merhaba")
     * @return Response
     */
    public function merhaba()
    {
        return $this->render('@BerkeomerogluTest/Merhaba/index.html.twig');
    }
}