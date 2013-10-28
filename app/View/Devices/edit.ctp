<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
<div class="row-fluid header">	
	<h2><?php echo __('Edit Device'); ?></h2>
</div>
<div class="row-fluid">	
	<div class="span9">
		<div class="devices form">
		
			<?php echo $this->Form->create('Device', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<div class="control-group">
						<?php echo $this->Form->label('device_token', 'Device Token', array('class' => 'control-label'));?>
						<div class="controls">
							<?php echo $this->Form->input('device_token', array('class' => 'span12', 'disabled' => '1')); ?>
						</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="control-group">
					  <?php echo $this->Form->label('enabled', 'Enabled', array('class' => 'control-label'));?>
					  <div class="controls">
						<?php echo $this->Form->input('enabled', array('options' => array('1' => 'Yes', '0' => 'No'),'value'=>'1')); ?>
					  </div>
					  <!-- .controls -->
					</div>		
					<?php echo $this->Form->hidden('id'); ?>
					
				</fieldset>
				<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->
	<div class="span3">	
		<div class="pop-dialog full">
			<div class="body">                        
				<div class="settings">
					<div class="items">
						<div class="item">
							<i class="icon-reorder"></i>
							<?php echo $this->Html->link(__('List Devices'), array('action' => 'index' )); ?>
						</div>
						<div class="item">
							<i class="icon-trash icon-formatted"></i>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Device.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Device.id'))); ?>
						</div>
						<div class="item">
							<i class="icon-plus icon-formatted"></i>
							<?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
