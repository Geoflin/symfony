<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\User;

/**
 * @Route("/challenge")
 */
class RoutingChallengeController extends AbstractController
{
    /**
     *@Route("/send-result/{id<\d+>}", methods={"POST"})
     */
    public function sendResult(string $id)
    {
        $url = $this->generateUrl('app_routingchallenge_getuseranswers', ['username' => 'John']);

        return new RedirectResponse($url);
    }

    /**
     * @Route(
     *    "/user-answers/{username}/{_format}",
     *    methods={"GET"},
     *    requirements={
     *         "_format": "html|json"
     *     }
     * )
     */
    public function getUserAnswers(string $username)
    {
    }

    /**
     * @Route("/user-answers/{username}/{id}")
     */
    public function getUserAnswer(string $username, int $id = 1)
    {
    }
}