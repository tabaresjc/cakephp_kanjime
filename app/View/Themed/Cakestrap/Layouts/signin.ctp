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
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_NAME ?> | <?php echo $title_for_layout; ?></title>
	<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')); ?>

	<!-- bootstrap -->
	<link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
	<link href="/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
	<link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
	<!-- libraries -->
	<link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="/admin/css/layout.css">
	<link rel="stylesheet" type="text/css" href="/admin/css/elements.css">
	<link rel="stylesheet" type="text/css" href="/admin/css/icons.css">

	<!-- this page specific styles -->
	<link rel="stylesheet" href="/admin/css/compiled/signin.css" type="text/css" media="screen" />
	<!-- open sans font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

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
<body class="login-bg" style="background-image: url(/admin/img/bgs/14.jpg);">
	<?php echo "\n"; ?>
	<div style="margin:20px;">
		<?php echo $this->Session->flash(). "\n";?>	
	</div>
	<?php echo $this->fetch('content'). "\n";?>
</body>

</html>

