<?php
	$this->append('custom_css');
	echo "\n";
	echo '    <!-- this page specific styles -->' . "\n";
	echo '    <link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
<div class="row">
	<div class="col-md-9">
		<div class="notifications form">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><?php echo __('Edit Notification'); ?></h3></div>			
				<?php echo $this->Form->create('Notification', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
					<div class="panel-body">
						<?php echo $this->Form->hidden('id'); ?>
						<div class="form-group">
							<?php echo $this->Form->label('message', 'Message', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-10">
								<?php echo $this->Form->input('message', array('class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->

						<div class="form-group">
							<?php echo $this->Form->label('settings', 'Settings', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-10">
								<?php echo $this->Form->input('settings', array('class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->

						<div class="form-group">
							<?php echo $this->Form->label('status', 'Status', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-10">
								<?php echo $this->Form->input('status', array('class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->
					</div>
					<div class="panel-footer">
						<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
						<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-large btn-primary pull-right')); ?>					
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="pop-dialog full">
			<div class="body">                        
				<div class="settings">
					<div class="items">
						<div class="item">
							<i class="icon-reorder"></i>
							<?php echo $this->Html->link(__('List Notifications'), array('action' => 'index')); ?>
						</div>						
												<div class="item">
							<i class="icon-trash icon-formatted"></i>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Notification.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Notification.id'))); ?>
						</div>
						<div class="item">
							<i class="icon-plus icon-formatted"></i>
							<?php echo $this->Html->link(__('Add Notification'), array('action' => 'add')); ?>
						</div>						
												
					</div>
				</div>
			</div>
		</div>

		
	</div>
</div>

