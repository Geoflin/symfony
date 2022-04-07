<?php

// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private const USERS = [
        ['name' => 'Nicolas', 'connected' => false, 'commentsPerPost' => [3, 6, 10, 2]],
        ['name' => 'Alice', 'connected' => true, 'commentsPerPost' => [15, 5, 7, 5, 22, 10, 9, 3]],
        ['name' => 'Grégory', 'connected' => false, 'commentsPerPost' => []],
    ];

    public function list(): Response
    {
        return $this->render('user/list.html.twig', [
            'users' => self::USERS,
        ]);
    }

    public function item(int $id): Response
    {
        return $this->render('user/_user.html.twig', [
            'user' => self::USERS[$id],
        ]);
    }
}