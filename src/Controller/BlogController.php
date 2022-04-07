<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_index")
     */
    public function index()
    {
        $url = $this->generateUrl('blog_posts_users_date', [
            'user' => 'john', 
            'year' => 2015,
        ]);

        return new Response(
            '<html><body>'.$url.'</body></html>'
        );
    }

    /**
     * @Route("/posts", name="blog_posts")
     */
    public function posts()
    {
	      return new Response(
            '<html><body>Liste des articles</body></html>'
        );
    }


    /**
     * @Route(
     *    "/posts/{user}/{year}",
     *    name="blog_posts_users_date",
     *    methods={"GET"}),
     *    requirements={"year"="^\d{4}$"}
     * }
     */
    public function postsFromUserAndYear(string $user, int $year = 2020)
    {
	      return new Response(
            '<html><body>'.$user.' '.$year.'</body></html>'
        );
    }
}