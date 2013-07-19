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
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $cakeDescription ?> | <?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->meta('icon');			
			echo $this->fetch('css');
		?>
	</head>
	<body>
	<?php echo $this->fetch('content'); ?>
	</body>
	<?php	
	echo $this->fetch('script');
	?>
</html>
<?php else : ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $cakeDescription ?> | <?php echo $title_for_layout; ?></title>		
		<?php
			echo $this->Html->meta('icon');			
			echo $this->fetch('meta');
			echo $this->Html->css('bootstrap.admin.min');
			echo $this->Html->css('bootstrap-responsive.admin.min');
			echo $this->Html->css('core.admin');
			echo $this->fetch('css');
		?>
	</head>
	<body>

		<div id="main-container">
			<div id="header" class="container">
				<?php echo $this->element('menu/top_menu'); ?>
			</div>
			<div id="content" class="container">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>			
			<div id="footer" class="container">
				
			</div>			
		</div><!-- #main-container -->
		
		<?php if(Configure::read('debug') > 1 ): ?>
		<div class="container">
			<div class="well">
				<small>
					<?php echo $this->element('sql_dump'); ?>
				</small>
			</div>
		</div>
		<?php endif; ?>

	</body>
	<?php	
	echo $this->Html->script('libs/jquery');
	echo $this->Html->script('libs/bootstrap.min');
	echo $this->fetch('script');
	?>
</html>
<?php endif; ?>