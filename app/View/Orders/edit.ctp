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
			  <h3 class="panel-title"><?php echo __('Edit Order'); ?></h3>
			</div>
		
			<?php echo $this->Form->create('Order', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<div class="panel-body">
					<div class="form-group">
					<?php echo $this->Form->label('name', 'Name', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('email', 'Email', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('comments', 'Comments', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('comments', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_kind', 'Payment Kind', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_kind', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_key', 'Payment Key', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_key', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_status', 'Payment Status', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_status', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_description', 'Payment Description', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_description', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_amount', 'Payment Amount', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_amount', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_currency', 'Payment Currency', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_currency', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->

					<div class="form-group">
					<?php echo $this->Form->label('payment_env', 'Environment', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-10">
					<?php echo $this->Form->input('payment_env', array('class' => 'form-control')); ?>
					</div><!-- .controls -->
					</div><!-- .control-group -->
					<?php echo $this->Form->hidden('id'); ?>
					<?php echo $this->Form->hidden('created'); ?>
					<?php echo $this->Form->hidden('token'); ?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
					<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-large btn-primary pull-right')); ?>
				</div>		
			<?php echo $this->Form->end(); ?>
		</div>
			
	</div><!-- #page-content .span9 -->
	<div class="col-md-3">
		<div class="pop-dialog full">
			<div class="body">                        
				<div class="settings">
					<div class="items">
						<div class="item">
							<i class="icon-reorder"></i>
							<?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?>
						</div>
						<div class="item">
							<i class="icon-trash icon-formatted"></i>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Order.id'))); ?>
						</div>
						<div class="item">
							<i class="icon-plus icon-formatted"></i>
							<?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?>
						</div>							
					</div>
				</div>
			</div>
		</div>				
	</div>	

</div><!-- #page-container .row-fluid -->
