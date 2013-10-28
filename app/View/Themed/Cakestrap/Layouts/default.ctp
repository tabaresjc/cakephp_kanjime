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
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_NAME ?> | <?php echo $title_for_layout; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- bootstrap -->
    <link href="/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
	
	<!-- libraries -->
    <link href="/admin/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
	
	<!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/compiled/layout.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/compiled/elements.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/compiled/icons.css">
	
	<?php echo $this->fetch('custom_css') . "\n"; ?>

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<!-- Fav and touch icons -->
	<link href="/favicon.png" type="image/x-icon" rel="icon" /><link href="/favicon.png" type="image/x-icon" rel="shortcut icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/icon-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/icon-72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/icon-57.png">
</head>
<body>
	<?php	
	echo "\n";
	echo $this->element('menu/top_menu', array('user' => $user_data, 'cur_controller' => $cur_controller, 'cur_action' => $cur_action));
	echo $this->element('menu/sidebar', array('user' => $user_data, 'cur_controller' => $cur_controller, 'cur_action' => $cur_action));
	echo "\n\t" . '<div class="content">' . "\n";
	echo "\t\t" . '<div id="pad-wrapper">' . "\n";
	echo $this->Session->flash(). "\n";
	echo $this->fetch('content'). "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
	if(Configure::read('debug') > 1 ){
		echo "\t" . '<div class="container">' . "\n";
		echo "\t" . '	<div class="well">' . "\n";
		echo "\t" . '		<small>' . "\n";
		echo $this->element('sql_dump');
		echo "\t" . '		</small>' . "\n";
		echo "\t" . '	</div>' . "\n";
		echo "\t" . '</div>' . "\n";
	}
	?>
</body>

	<!-- scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/jquery-ui-1.10.2.custom.min.js"></script>
	<script src="/admin/js/theme.js"></script>	
	<?php echo $this->fetch('custom_script'); ?>
</html>
