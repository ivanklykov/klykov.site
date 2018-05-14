<?php

namespace App\Controller;


use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class BlogController extends Controller
{
    /**
     * @Route("/blog/{id}", name="blog_article", requirements={"id"="\d+"})
     */
    
    public function show($id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }

        return $this->render("blog/post.html.twig", array(
            "id" => $id,
            "controller_name" => "blog",
            "title" => $article->getTitle(),
            "content" => $article->getContent(),
        ));
     
    }

    /**
     * @Route("/blog", name="blog_list")
     */

    public function list()
    {
        $articles = $this->getDoctrine()
        ->getRepository(Post::class)
        ->findAll();

        return $this->render('blog/index.html.twig', array(
            'articles' => $articles,
            'controller_name' => 'blog'
        ));
    }
}
