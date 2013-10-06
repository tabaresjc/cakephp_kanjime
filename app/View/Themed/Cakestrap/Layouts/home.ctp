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
	if (!defined('SITE_NAME')) {
		define('SITE_NAME', __d('cake_dev', 'Kanji Me!'));
	}	
	$cur_controller = $this->params['controller'];
	$cur_action = $this->params['action'];
	$user_data = $this->Session->read('Auth.User');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" class="no-js"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" class="no-js"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" class="no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_NAME ?> | <?php echo $title_for_layout; ?></title>	
	<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')); ?>

	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	
	<?php echo $this->fetch('custom_css') . "\n"; ?>

	<!-- open sans font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700" rel="stylesheet" type="text/css">

	<!-- Fav and touch icons -->
	<link href="/favicon.png" type="image/x-icon" rel="icon" /><link href="/favicon.png" type="image/x-icon" rel="shortcut icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body><?php
	echo "\n";
	echo $this->fetch('content'). "\n";
	?>
</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/jquery.flexslider.js"></script> 
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.3/jquery.scrollTo.min.js"></script> 
	<script src="//cdn.jsdelivr.net/jquery.localscroll/1.2.8b/jquery.localScroll.js"></script> 
	<script type="text/javascript" src="/js/big-thing.js"></script>
	<?php echo $this->fetch('custom_script'); ?>
</html>


