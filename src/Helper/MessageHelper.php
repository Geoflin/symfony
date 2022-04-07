<?php

// src/Helper/MessageHelper.php
namespace App\Helper;

use Symfony\Component\Routing\RouterInterface;

class MessageHelper
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function addUrlsToMessages(array $messages): array
    {
        $messagesWithURLs = [];

        foreach ($messages as $index => $message) {
            $messagesWithURLs[] = [
                'text' => $message,
                'url' => $this->router->generate('message_item', ['id' => $index]),
            ];
        }

        return $messagesWithURLs;
    }
}