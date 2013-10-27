
<div class="row-fluid">	
	<div class="span9">
		<div class="devices form">
		
			<?php echo $this->Form->create('Device', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Add Device'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('device_token', 'device_token', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('device_token', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('enabled', 'enabled', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('enabled', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->
	<div class="span3">		
		<div class="actions">		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?></li>
							</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
