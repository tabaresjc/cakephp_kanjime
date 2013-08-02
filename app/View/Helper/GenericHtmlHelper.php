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

	public function addHtmlStart($controller, $action) {
		$out = '';
		if($controller==='pages' && $action==='display'){
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<!--[if lt IE 7 ]><html class="ie ie6" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if IE 7 ]><html class="ie ie7" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if IE 8 ]><html class="ie ie8" lang="en" class="no-js"> <![endif]-->' . "\n";
			$out .= '<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->' . "\n";
		} else if($controller==='users' && $action==='login') {
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<html class="login-bg">' . "\n";					
		} else {
			$out .= '<!DOCTYPE html>' . "\n";
			$out .= '<html>' . "\n";			
		}
		return $out;
	}
	
	public function addMetaLinks($controller, $action) {
		$out = '';
		$out .= "\n";
		$out .= "\t". $this->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')). "\n";
		return $out;
	}
	
	public function addCssLinks($controller, $action) {
		$out = '';
		if($controller==='pages' && $action==='display'){
			$out .= "\t". '<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">'. "\n";
			$out .= "\t". '<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">'. "\n";
			$out .= "\t". $this->css('style'). "\n";
		} else {
			$out .= "\t" . '<!-- bootstrap -->' . "\n";
			$out .= "\t" . '<link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />' . "\n";
			$out .= "\t" . '<link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />' . "\n";
			$out .= "\t" . '<link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />' . "\n";
			
			$out .= "\t" . '<!-- libraries -->' . "\n";
			$out .= "\t" . '<link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />' . "\n";
			
			$out .= "\t" . '<!-- global styles -->' . "\n";
			$out .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/layout.css">' . "\n";
			$out .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/elements.css">' . "\n";
			$out .= "\t" . '<link rel="stylesheet" type="text/css" href="/admin/css/icons.css">' . "\n";
		}
		return $out;
	}
	
	public function addScriptsLinks($controller, $action) {
		$out = '';
		if($controller==='pages' && $action==='display'){
			$out .= "\t". '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>' . "\n";
			$out .= "\t". '<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>' . "\n";
			$out .= "\t". '<script src="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/jquery.flexslider.js"></script> ' . "\n";
			$out .= "\t". '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script> ' . "\n";
			$out .= "\t". '<script src="//cdn.jsdelivr.net/jquery.localscroll/1.2.8b/jquery.localScroll.js"></script> ' . "\n";
			$out .= "\t". '<script type="text/javascript" src="/js/big-thing.js"></script>' . "\n";
		} else {
			$out .= "\t" . '<!-- scripts -->' . "\n";
			$out .= "\t" . '<script src="http://code.jquery.com/jquery-latest.js"></script>' . "\n";
			$out .= "\t" . '<script src="/admin/js/bootstrap.min.js"></script>' . "\n";
			$out .= "\t" . '<script src="/admin/js/theme.js"></script>' . "\n";
		} 
		return $out;		
	}
	
	public function addFontsLinks($controller, $action) {
		$out = '';
		if($controller==='pages' && $action==='display'){
			$out .= "\t". '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700" rel="stylesheet" type="text/css">' . "\n";
		} else {
			$out .= "\t" . '<!-- open sans font -->' . "\n";
			$out .= "\t" . '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">' . "\n";
		}
		return $out;	
	}		
	
	public function addIconsLinks($controller, $action) {
		$out = '';		
		$out .= "\t". '<!-- Fav and touch icons -->' . "\n";
		$out .= "\t". $this->meta('icon','/img/favicon.ico'). "\n";
		$out .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">' . "\n";
		$out .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">' . "\n";
		$out .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">' . "\n";
		$out .= "\t". '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">' . "\n";	

		$out .= "\t" . '<!--[if lt IE 9]>' . "\n";
		$out .= "\t" . '  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>' . "\n";
		$out .= "\t" . '<![endif]-->' . "\n";		
		return $out;		
	}
	
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
