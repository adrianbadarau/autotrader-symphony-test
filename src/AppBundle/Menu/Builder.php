<?php
/**
 * Created by PhpStorm.
 * User: adiba
 * Date: 22-Jan-17
 * Time: 13:05
 */

namespace AppBundle\Menu;


use Knp\Menu\MenuFactory;

class Builder
{
    public function mainMenu(MenuFactory $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Home',['route' => 'homepage']);
        $menu->addChild('Cars',['route' => 'car.index']);

        return $menu;
    }
}