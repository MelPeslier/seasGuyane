<?php

namespace App\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Symfony\Component\HttpFoundation\RequestStack;

class AppExtension extends AbstractExtension
{
    private $requestStack;
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('set_active_route', [$this, 'setActiveRoute']),
        ];
    }

    public function setActiveRoute(string $route): string
    {
        $currentRoute = $this->requestStack->getCurrentRequest()->attributes->get('_route');

        return $currentRoute === $route ? 'active' : '';
    }
}
