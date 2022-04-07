<?php

// src/Twig/RelativeExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class RelativeExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('relative', [$this, 'relative']),
        ];
    }

    public function relative(\DateTimeInterface $date): string
    {
        $now = (new \DateTime());
        $diff = $now->format('U') - $date->format('U');

        if ($diff < 60) {
            return sprintf($diff > 1 ? 'il y a %s secondes' : 'il y a une seconde', $diff);
        }

        $diff = floor($diff/60);

        if ($diff < 60) {
            return sprintf($diff > 1 ? 'il y a %s minutes' : 'il y a une minute', $diff);
        }

        $diff = floor($diff/60);

        if ($diff < 24) {
            return sprintf($diff > 1 ? 'il y a %s heures' : 'il y a une heure', $diff);
        }

        $diff = floor($diff/24);

        if ($diff < 7) {
            return sprintf($diff > 1 ? 'il y a %s jours' : 'hier', $diff);
        }

        if ($diff < 30) {
            $diff = floor($diff / 7);

            return sprintf($diff > 1 ? 'il y a %s semaines' : 'il y a une semaine', $diff);
        }

        $diff = floor($diff/30);

        if ($diff < 12) {
            return sprintf($diff > 1 ? 'il y a %s mois' : 'le mois dernier', $diff);
        }

        $diff = date('Y', $now) - date('Y', $date);

        return sprintf($diff > 1 ? 'il y a %s ans' : 'l\'année dernière', $diff);
    }
}