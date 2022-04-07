<?php

// src/Controller/PostController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private $posts = [];

    public function __construct()
    {
        $this->posts = [
            ['title' => 'Lorem ipsum dolor sit amet', 'createdAt' => new \DateTime(), 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis fermentum risus, ac lacinia turpis. Praesent consectetur nisi semper felis luctus scelerisque. Aenean felis est, maximus et ullamcorper id, placerat vitae ligula. In tempor finibus ultrices. Sed eleifend pharetra eros nec tincidunt. Sed sollicitudin enim dolor, in fringilla odio convallis id. Curabitur erat arcu, condimentum sed felis sed, auctor mollis est. Vivamus id neque pellentesque mi ultricies porttitor a et magna. In hac habitasse platea dictumst. Vestibulum a justo tempor elit consequat blandit non id felis.'],
            ['title' => 'Etiam elementum velit ac laoreet interdu', 'createdAt' => new \DateTime('1 week ago'), 'content' => 'Etiam elementum velit ac laoreet interdum. Duis elementum ornare libero, vitae finibus ex fringilla at. Mauris quis sodales diam. Sed consectetur at urna id suscipit. Etiam hendrerit pharetra nibh, vitae tristique velit pharetra at. Aenean facilisis turpis non diam rutrum, vitae hendrerit tellus auctor. Duis aliquet nulla dolor, eu fringilla odio pellentesque id. Praesent vestibulum sapien massa, sit amet tristique nibh tempor congue. Nullam lorem erat, suscipit eget condimentum in, convallis vitae odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.'],
            ['title' => 'Nunc pretium tincidunt eros', 'createdAt' => new \DateTime('1 month ago'), 'content' => 'Nunc pretium tincidunt eros, et eleifend nibh interdum at. Pellentesque in est sed augue facilisis interdum ut non libero. Duis efficitur ac leo id volutpat. Cras dapibus est hendrerit tellus tincidunt, quis tincidunt turpis pharetra. Donec vel ex blandit, efficitur turpis vel, consequat diam. Curabitur eget magna et diam imperdiet maximus et sed mauris. Integer commodo rutrum felis, vel tincidunt diam cursus eget. Etiam faucibus ante ac odio faucibus, sed ullamcorper orci tincidunt. Praesent quis justo sit amet leo elementum finibus et sit amet quam. Morbi efficitur vehicula dapibus. Vestibulum non ex nisi.'],
        ];
    }

    /**
     * @Route("/", name="post_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $this->posts,
        ]);
    }

    /**
     * @Route("/article/{id}", name="post_show", methods={"GET"})
     */
    public function show(int $id): Response
    {
        if (!isset($this->posts[$id])) {
            throw $this->createNotFoundException('Cet article n\'existe pas.');
        }

        return $this->render('post/show.html.twig', [
            'post' => $this->posts[$id],
        ]);
    }
}