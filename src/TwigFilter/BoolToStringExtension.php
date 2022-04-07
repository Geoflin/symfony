<?php

// src/TwigFilter/BoolToStringExtension.php
namespace App\TwigFilter;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class BoolToStringExtension extends AbstractExtension
{
    
    public function getFilters()
    {
        return [
            new TwigFilter('boolToString', [$this, 'boolToString']),
        ];
    }

    public function boolToString(bool $bool): string
    {
        return $bool ? 'Oui' : 'Non';
    }
}