<?php

// src/Controller/MessageController.php
namespace App\Controller;

use App\Helper\MessageHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    public const MESSAGES = ['Bonjour', 'Bonsoir', 'Au revoir', 'Salut', 'Coucou', 'Ciao', 'Adieu', 'Bienvenue', 'Bonne nuit', 'Bye'];

    /**
     * @Route("/messages/{id}", name="message_item")
     */
    public function item(int $id): Response
    {
        if (!isset(self::MESSAGES[$id])) {
            throw $this->createNotFoundException('Le message n\'existe pas');
        }

        $response = $this->json(self::MESSAGES[$id]);
        $response->setSharedMaxAge(3600);
        $response->setEtag(md5($response->getContent()));

        return $response;
    }
}