<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-25
 * Time: 10:04
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/test-me")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testMe()
    {
        $form = $this->createFormBuilder()
            ->add('name')
            ->add('password')
            ->add('submit', SubmitType::class)
            ->getForm();

        return $this->render('test/test_me.html.twig', [
           'form' => $form->createView(),
        ]);
    }
}