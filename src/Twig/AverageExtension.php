<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AverageExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('average', [$this, 'average']),
        ];
    }

    public function average(array $array): float
    {
        if (count($array) === 0) {
            return 0;
        }

        return ceil(array_sum($array) / count($array));
    }
}