<?php

namespace CustomBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        // Seems like the container is not injected here. I am probably calling
        // this builder the wrong way.
        $menu = $options['menu'];
        $user = $options['user'];
        $router = $options['router'];

        if ($user->isAdmin()) {
        }
        return $menu;
    }
}
