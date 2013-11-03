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
				<div class="panel-heading"><h3 class="panel-title"><?php echo __('Add Notification'); ?></h3></div>			
				<?php echo $this->Form->create('Notification', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
					<div class="panel-body">
						<div class="form-group">
							<?php echo $this->Form->label('message', 'Message', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-10">
								<?php echo $this->Form->input('message', array('class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->

						<div class="form-group">
							<?php echo $this->Form->label('badge', 'Badge', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-5">
								<?php echo $this->Form->input('badge', array('class' => 'form-control', 'value'=>'0')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->
						
						<div class="form-group">
							<?php echo $this->Form->label('minutes', 'Send in (Minutes)', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-5">
								<?php echo $this->Form->input('minutes', array('options'=> $this->Notification->getMinutesOptions(), 'default'=>'1', 'class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->
						<?php echo $this->Form->hidden('settings', array('value' => '')); ?>
						<?php echo $this->Form->hidden('status', array('value' => '1')); ?>						
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
												
					</div>
				</div>
			</div>
		</div>

		
	</div>
</div>

