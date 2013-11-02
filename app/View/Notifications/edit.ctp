
<div class="row-fluid">	
	<div class="span9">
		<div class="notifications form">
		
			<?php echo $this->Form->create('Notification', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Notification'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('message', 'message', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('message', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('settings', 'settings', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('settings', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('status', 'status', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('status', array('class' => 'span12')); ?>
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
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Notification.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Notification.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Notifications'), array('action' => 'index')); ?></li>
							</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
