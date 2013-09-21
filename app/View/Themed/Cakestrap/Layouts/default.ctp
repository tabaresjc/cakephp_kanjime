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

	$this->start('htmlstart');
	echo $this->Html->addHtmlStart($cur_controller,$cur_action);
	$this->end();

	$this->start('meta');
	echo $this->Html->addMetaLinks($cur_controller,$cur_action);
	$this->end();

	$this->start('css');
	echo $this->Html->addCssLinks($cur_controller,$cur_action);
	$this->end();

	$this->start('script');
	echo $this->Html->addScriptsLinks($cur_controller,$cur_action);
	$this->end();

	$this->start('fontlinks');
	echo $this->Html->addFontsLinks($cur_controller,$cur_action);
	$this->end();


	$this->start('iconlinks');
	echo $this->Html->addIconsLinks($cur_controller,$cur_action);
	$this->end();
	$user_data = $this->Session->read('Auth.User');
?>
<?php echo $this->fetch('htmlstart'); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_NAME ?> | <?php echo $title_for_layout; ?></title>
	<?php
	echo $this->fetch('meta') . "\n";
	echo $this->fetch('css') . "\n";
	echo $this->fetch('custom_css') . "\n";
	echo $this->fetch('fontlinks') . "\n";
	echo $this->fetch('iconlinks');
	?>
</head>
<body><?php
	if($cur_controller==='pages' && $cur_action==='display') {
		echo $this->fetch('content'). "\n";
	} else if($cur_controller==='users' && ($cur_action==='login' || $cur_action==='signup')){
		echo $this->Session->flash(). "\n";
		echo $this->fetch('content'). "\n";
	} else {
		echo $this->element('menu/top_menu', array('user' => $user_data, 'cur_controller' => $cur_controller, 'cur_action' => $cur_action));
		echo $this->element('menu/sidebar', array('user' => $user_data, 'cur_controller' => $cur_controller, 'cur_action' => $cur_action));
		echo "\n" . $this->element('menu/content_header');
		echo $this->Session->flash(). "\n";
		echo $this->fetch('content'). "\n";
		echo $this->element('menu/content_footer');
		if(Configure::read('debug') > 1 ){
			echo "\t" . '<div class="container">' . "\n";
			echo "\t" . '	<div class="well">' . "\n";
			echo "\t" . '		<small>' . "\n";
			echo $this->element('sql_dump');
			echo "\t" . '		</small>' . "\n";
			echo "\t" . '	</div>' . "\n";
			echo "\t" . '</div>' . "\n";
		}
	}
	echo $this->fetch('script');
	echo $this->fetch('custom_script');
	?>
</body>
</html>

<body>


