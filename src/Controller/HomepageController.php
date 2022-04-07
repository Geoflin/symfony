<?php

// src/Controller/HomepageController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function homepage()
    {
        $lastPost = new class {
            private  $title;
            private  $createdAt;

            public function __construct()
            {
                $this->title = 'Mon article';
                $this->createdAt = new \DateTime();
            }

            public function getTitle(): string
            {
                return $this->title;
            }

            public function getCreatedAt(): \DateTime
            {
                return $this->createdAt;
            }
        };

        return $this->render('homepage.html.twig', [
            'title' => 'Page d\'accueil',
            'content' => 'Ceci est le contenu de ma page d\'accueil',
            'lastPost' => $lastPost,
        ]);
    }
}