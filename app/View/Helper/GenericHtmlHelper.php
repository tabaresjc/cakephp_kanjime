<?php
// app/View/Helper/MyHtmlHelper.php
App::uses('HtmlHelper', 'View/Helper');
class GenericHtmlHelper extends HtmlHelper {
    protected $listOfLink = array(
        array(
            'icon' => 'icon-home',
			'name' => 'Home',
			'url' => array('controller' => 'admins', 'action' => 'index'),
			'controller' => array('admins')
        ),
		array(
            'icon' => 'icon-credit-card',
			'name' => 'Orders',
			'url' => array('controller' => 'orders', 'action' => 'index'),
			'controller' => array('orders')
        ),
		array(
            'icon' => 'icon-tags',
			'name' => 'Kanji',
			'url' => 'javascript:void(0);',
			'controller' => array('collections'),
			'childs' => array(
				array(
					'name' => 'Kanji List',
					'url' => array('controller' => 'collections', 'action' => 'index')
				),
				array(
					'name' => 'New Name',
					'url' => array('controller' => 'collections', 'action' => 'add')
				)
			)
        ),			
		array(
            'icon' => 'icon-group',
			'name' => 'Users',
			'url' => 'javascript:void(0);',
			'controller' => array('users','groups'),
			'childs' => array(
				array(
					'name' => 'User List',
					'url' => array('controller' => 'users', 'action' => 'index')
				),
				array(
					'name' => 'New User',
					'url' => array('controller' => 'users', 'action' => 'add')
				),
				array(
					'name' => 'Groups',
					'url' => array('controller' => 'groups', 'action' => 'index')
				)
			)
        ),
    );

	public function getLinksToControllers($user = null, $controller, $action){
		$out = '';
		foreach($this->listOfLink as $single){
			$contr_class =  in_array($controller,$single['controller']) ? 'active' : '';
			$out .= "\t" . '<li class="'. $contr_class .'">' . "\n";
			
			if(!empty($contr_class)){
				$out .= "\t" . '	<div class="pointer">' . "\n";
				$out .= "\t" . '		<div class="arrow"></div>' . "\n";
				$out .= "\t" . '		<div class="arrow_border"></div>' . "\n";
				$out .= "\t" . '	</div>' . "\n";
			}
			
			if(isset($single['childs'])){				
				$out .= "\t" . '	<a class="dropdown-toggle" href="javascript:void(0);">' . "\n";
				$out .= "\t" . '		<i class="'.$single['icon'].'"></i>' . "\n";
				$out .= "\t" . '		<span>'.$single['name'].'</span>' . "\n";
				$out .= "\t" . '		<i class="icon-chevron-down"></i>' . "\n";
				$out .= "\t" . '	</a>' . "\n";
				if(!empty($contr_class)){				
					$out .= "\t" . '	<ul class="submenu active">' . "\n";
				} else {
					$out .= "\t" . '	<ul class="submenu">' . "\n";
				}
				foreach($single['childs'] as $child){
					$action_class = $child['url']['controller']===$controller && $child['url']['action']===$action ? 'active' : '';
					$out .= "\t" . '		<li>'. $this->link($child['name'], $child['url'], array('class'=>$action_class)) .'</li>' . "\n";
				}
				$out .= "\t" . '	</ul>' . "\n";				
			} else {
				
				$out .= "\t" . '	<a href="'. Router::url($single['url']) .'">' . "\n";
				$out .= "\t" . '		<i class="'.$single['icon'].'"></i>' . "\n";
				$out .= "\t" . '		<span>'.$single['name'].'</span>' . "\n";
				$out .= "\t" . '	</a>' . "\n";
					
			}
			$out .= "\t" . '</li>' . "\n";		
		}
		
		return $out;
	}
}
