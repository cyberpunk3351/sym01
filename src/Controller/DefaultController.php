<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
Use App\Entity\Post;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'post'=>$post

        ]);
    }

    /**
     * @Route("/post/single/{post}", name="single")
     */
    public function single(Post $post)
    {
        return $this->render('default/single.html.twig', [
            'post'=>$post

        ]);
    }
}
