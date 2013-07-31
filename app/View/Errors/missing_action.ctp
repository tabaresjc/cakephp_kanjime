<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
	<div class="row-fluid">
			<div class="alert alert-block alert-error fade in">
				<h2 class="alert-heading">Oh snap! You got an error!</h2>
				<h5><?php echo __d('cake_dev', 'The action %1$s is not defined in controller %2$s', '<em>' . $action . '</em>', '<em>' . $controller . '</em>'); ?></h5>
				<p>
					<?php echo $this->Html->link('Go to Main Page', '/', array('class'=>'btn btn-danger')); ?>
				</p>
			</div>
			<div class="well">
				<?php echo $this->element('exception_stack_trace'); ?>
			</div>
	</div>
