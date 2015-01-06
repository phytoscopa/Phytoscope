<?php

// src/Phytoscope/AppBundle/Menu/Builder.php

 
namespace Phytoscope\AppBundle\Menu;
 
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

 
class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
    	$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav navbar-nav');
 
		/*$menu->addchild('Home', array('route' => 'phytoscope_app_homepage', 'label' => ''))
			->setAttribute('glyphicon', 'glyphicon-home');*/
		
		$menu->addChild('BE', array('route' =>'phytoscope_app_be', 'label' => 'B.E.'));
		
		$menu->addChild('Collect', array('route' => 'phytoscope_app_homepage', 'label' => 'Colléctivités'));
 
		$menu->addChild('Contact', array('route' => 'phytoscope_app_homepage', 'label' => 'Contact'));
 
        return $menu;
    }
 
    public function userMenu(FactoryInterface $factory, array $options)
    {
    	$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
 
    	/*
    	You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.*/
		
		$user = $this->container->get('security.context')->getToken()->getUser(); // Get username of the current logged in user_error()
		// Check if the visitor has any authenticated roles
		if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN'))) {
	    	$menu->addChild('DashBoard', array('route' => 'sonata_admin_dashboard', 'label' => ''))
				->setAttribute('glyphicon', 'glyphicon-dashboard');
		}
    	if($this->container->get('security.context')->isGranted(array('ROLE_USER'))) {
	    	$menu->addChild('User', array('label' => $user->getUserName()))
				->setAttribute('dropdown', true)
				->setAttribute('icon', 'fa fa-user');
			$menu['User']->addChild('Mon compte', array('route' => 'sonata_user_profile_edit'));
    	} else {
	    	$menu->addChild('User', array('label' => 'Connexion'))
				->setAttribute('dropdown', true)
				->setAttribute('glyphicon', 'glyphicon-user');
 
			$menu['User']->addChild('Mon compte', array('route' => 'sonata_user_profile_edit'))
				->setAttribute('icon', 'fa fa-edit');
    	}
    	
 
    	
		 
        return $menu;
    }
}