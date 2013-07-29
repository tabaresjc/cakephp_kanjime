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
	echo "\t". '<!-- bootstrap -->' . "\n";
	echo "\t". '<link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />' . "\n";
	echo "\t". '<link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />' . "\n";
	echo "\t". '<link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!-- libraries -->' . "\n";
	echo "\t". '<link href="/admin/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />' . "\n";
	echo "\t". '<link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!-- global styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" type="text/css" href="/admin/css/layout.css">' . "\n";
	echo "\t". '<link rel="stylesheet" type="text/css" href="/admin/css/elements.css">' . "\n";
	echo "\t". '<link rel="stylesheet" type="text/css" href="/admin/css/icons.css">' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/index.css" type="text/css" media="screen" />    ' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!-- open sans font -->' . "\n";
	echo "\t". '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!-- lato font -->' . "\n";
	echo "\t". '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">' . "\n";
	echo "\t". '' . "\n";
	echo "\t". '<!--[if lt IE 9]>' . "\n";
	echo "\t". '  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>' . "\n";
	echo "\t". '<![endif]-->' . "\n";
	$this->end();
	
	$this->start('script');
	echo "\t". '<!-- scripts -->' . "\n";
	echo "\t". '<script src="http://code.jquery.com/jquery-latest.js"></script>' . "\n";
	echo "\t". '<script src="/admin/js/bootstrap.min.js"></script>' . "\n";
	echo "\t". '<script src="/admin/js/jquery-ui-1.10.2.custom.min.js"></script>' . "\n";
	echo "\t". '<!-- knob -->' . "\n";
	echo "\t". '<script src="/admin/js/jquery.knob.js"></script>' . "\n";
	echo "\t". '<!-- flot charts -->' . "\n";
	echo "\t". '<script src="/admin/js/jquery.flot.js"></script>' . "\n";
	echo "\t". '<script src="/admin/js/jquery.flot.stack.js"></script>' . "\n";
	echo "\t". '<script src="/admin/js/jquery.flot.resize.js"></script>' . "\n";
	echo "\t". '<script src="/admin/js/theme.js"></script>' . "\n";
	$this->end();	
?>
<!DOCTYPE html>
<html>
<head>
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
	echo $this->fetch('custom_script');
	?>
</body>
</html>
<?php endif; ?>

