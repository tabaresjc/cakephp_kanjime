
<?php
	$this->Html->addCrumb(__('List Collections'), array('action' => 'index'));
	$this->Html->addCrumb(__('Edit Collection'), null);
?>

<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Collection.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Collection.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Collections'), array('action' => 'index')); ?></li>
							</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="collections form">
		
			<?php echo $this->Form->create('Collection', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Collection'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('title', 'title', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('title', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('subtitle', 'subtitle', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('subtitle', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('description', 'description', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('description', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('body', 'body', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('body', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
