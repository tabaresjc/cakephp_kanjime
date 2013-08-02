<?php

?>

	<div class="row-fluid header">
		<div id="message_placeholder">
		</div>		
		<h3><?php echo __('Create Group'); ?></h3>
	</div>
	<div class="row-fluid">
		<!-- left column -->
		<div class="span9">
			<div class="groups form">
				<?php echo $this->Form->create('Group', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
					<fieldset>
					<div class="control-group">
					<?php echo $this->Form->label('name', 'Name', array('class' => 'control-label'));?>
					<div class="controls">
					<?php echo $this->Form->input('name', array('class' => 'span12')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					</fieldset>
					<div class="well">
						<div class="btn-toolbar">
							<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary pull-right')); ?>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>			
		<!-- side right column -->
		<div class="span3">
			<h6><?php echo __('What you can do'); ?></h6>
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>		
		</div>		
	<div>


