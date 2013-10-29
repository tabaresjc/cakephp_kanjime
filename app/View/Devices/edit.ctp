<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
<div class="row">	
	<div class="col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title"><?php echo __('Edit Device'); ?></h3>
			</div>
			<?php echo $this->Form->create('Device', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<div class="panel-body">
					<div class="form-group">
						<?php echo $this->Form->label('device_token', 'Device Token', array('class' => 'col-lg-2 control-label'));?>
						<div class="col-lg-10">
							<?php echo $this->Form->input('device_token', array('class' => 'form-control', 'disabled' => '1')); ?>
						</div><!-- .col-lg-10 -->
					</div><!-- .form-group -->
					<div class="form-group">
					  <?php echo $this->Form->label('enabled', 'Enabled', array('class' => 'col-lg-2 control-label'));?>
					  <div class="col-lg-10">
						<?php echo $this->Form->input('enabled', array('options' => $this->Html->booleanLabels(), 'value'=>'1')); ?>
					  </div>
					  <!-- .col-lg-10 -->
					</div><!-- .form-group -->
				</div>
				<?php echo $this->Form->hidden('id'); ?>
				<div class="panel-footer">
					<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
					<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-large btn-primary pull-right')); ?>
				</div>			
			<?php echo $this->Form->end(); ?>		
		</div>
	</div>
	<!-- side right column -->
	<div class="col-md-3">	
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
	</div>		
</div>
