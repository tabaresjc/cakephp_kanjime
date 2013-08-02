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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
	<div class="row-fluid">
			<div class="alert alert-block alert-error fade in">
				<?php echo $this->Html->link('Go to Main Page', '/', array('class'=>'btn btn-danger pull-right')); ?>
				<h2 class="alert-heading"><?php echo __d('cake', 'Error'); ?></h2>
				<h5><?php echo __d('cake', 'An Internal Error Has Occurred.'); ?></h5>
				<p><?php echo $name; ?></p>
				
			</div>
			<div class="well">
				<?php echo $this->element('exception_stack_trace'); ?>
			</div>
	</div>

