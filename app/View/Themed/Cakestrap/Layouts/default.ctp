<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Kanji Me!');
?>
<?php if($this->params['controller']=='pages' && $this->params['action']=='display'): ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" class="no-js"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" class="no-js"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" class="no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title><?php echo $cakeDescription ?> | <?php echo $title_for_layout; ?></title>
	<?php echo $this->Html->charset(); ?>
	<?php
	echo $this->fetch('meta') . "\n";
	echo $this->fetch('css') . "\n";
	?>
</head>
<body>
	<?php
	echo $this->fetch('content'). "\n";
	echo $this->fetch('script'). "\n";
	?>
</body>
</html>
<?php else : ?>
<?php
	$this->start('meta');
	echo "\n";
	echo "\t". $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')). "\n";
	echo "\t". $this->Html->meta('favicon.ico','/img/favicon.ico',array('type' => 'icon')). "\n";
	$this->end();

	$this->start('css');
	echo "\t". '<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">'. "\n";
	echo "\t". $this->Html->css('core.admin'). "\n";
	echo "\t". '<!-- HTML5 shim, for IE6-8 support of HTML5 elements and IE Fallback-->' . "\n";
	echo "\t". '<!--[if lt IE 9]>' . "\n";
	echo "\t". '<script src="/js/html5shiv.js"></script>' . "\n";
	echo "\t". '<link href="/css/ie.css" rel="stylesheet">' . "\n";
	echo "\t". '<![endif]-->' . "\n";
	echo "\t". '<!-- Fav and touch icons -->' . "\n";
	echo "\t". '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">' . "\n";
	echo "\t". '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">' . "\n";
	echo "\t". '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">' . "\n";
	echo "\t". '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">' . "\n";
	$this->end();
	
	$this->start('script');
	echo "\n";
	echo "\t". '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>' . "\n";
	echo "\t". '<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>' . "\n";
	$this->end();	
?>
<!DOCTYPE html>
<html lang="en">
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" class="no-js"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" class="no-js"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" class="no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?> | <?php echo $title_for_layout; ?></title>
	<?php
	echo $this->fetch('meta') . "\n";
	echo $this->fetch('css') . "\n";
	?>
</head>
<body>
	<div id="main-container">
		<div id="header" class="container">
		<?php echo $this->element('menu/top_menu'). "\n"; ?>
		</div>
		<div id="content" class="container">
		<?php echo $this->Session->flash(). "\n"; ?>
		<?php echo $this->fetch('content'). "\n"; ?>
		</div>
		<div id="footer" class="container">
		</div>
	</div>
	<?php if(Configure::read('debug') > 1 ): ?>
	<div class="container">
		<div class="well">
			<small>
			<?php echo $this->element('sql_dump'); ?>
			</small>
		</div>
	</div>
	<?php endif; ?>
	<?php
	echo $this->fetch('script');
	?>
</body>
</html>
<?php endif; ?>