<?php

namespace Hypersites\MonicaBundle\Menu;

use Knp\Menu\FactoryInterface;

/**
 *
 * @author alexandre
 * @package Monica
 *
 */
class Builder {
    public function mainMenu(FactoryInterface $factory, array $options)
    {
       // This will add the proper classes to your UL
        // Use push_right if you want your menu on the right
        $menu = $factory->createItem('root', array(
            'navbar' => true,
        ));

        // Regular menu item, no change
        $menu->addChild('Home', array('route' => 'monica_default_index'));

        // Create a dropdown
        $dropdown = $menu->addChild('Customers', array(
        	'route' => 'customer',
        ));


        $orders = $menu->addChild('Orders', array(
        	'dropdown' => true,
       		'caret' => true,
        ));

        $stock = $menu->addChild('Stock', array(
        	'route' => 'customer'
        ));

        $orders->addChild('List', array('route' => 'customer_new'));

        return $menu;
    }


}

?>