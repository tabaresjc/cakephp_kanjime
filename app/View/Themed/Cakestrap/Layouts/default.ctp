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
?>
<?php echo $this->fetch('htmlstart'); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?> | <?php echo $title_for_layout; ?></title>
	<?php
	echo $this->fetch('meta') . "\n";
	echo $this->fetch('css') . "\n";
	echo $this->fetch('custom_css') . "\n";
	?>
</head>
<body>
	<?php
	if($cur_controller==='pages' && $cur_action==='display') {
		echo $this->fetch('content'). "\n";
	} else if($cur_controller==='users' && ($cur_action==='login' || $cur_action==='signup')) {
		echo $this->Session->flash(). "\n";
		echo $this->fetch('content'). "\n";
	} else {
	?>
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
	}
	echo $this->fetch('script');
	echo $this->fetch('custom_script');	
	?>
</body>
</html>

<body>


