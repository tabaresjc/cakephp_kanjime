
<div class="row-fluid">	
	<div class="span9">
		<div class="orders form">
		
			<?php echo $this->Form->create('Order', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Order'); ?></h2>
			

<div class="control-group">
	<?php echo $this->Form->label('name', 'name', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('name', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('email', 'email', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('email', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('comments', 'comments', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('comments', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_kind', 'payment_kind', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_kind', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_key', 'payment_key', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_key', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_status', 'payment_status', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_status', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_description', 'payment_description', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_description', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_amount', 'payment_amount', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_amount', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_currency', 'payment_currency', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_currency', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('payment_env', 'payment_env', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('payment_env', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->
				<?php echo $this->Form->hidden('id'); ?>
				<?php echo $this->Form->hidden('created'); ?>
				<?php echo $this->Form->hidden('token'); ?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->
	<div class="span3">		
		<div class="actions">		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Order.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
							</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
