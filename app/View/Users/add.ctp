<?php
	$this->append('custom_css');
		echo "\t" . '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';	
	$this->end();
	$this->append('custom_script');
		echo "\n\t". $this->Html->script('libs/users');
	$this->end();		
?>
		<div class="row">
			<!-- left column -->
			<div class="col-md-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title"><?php echo __('Create a new user'); ?></h3>
					</div>			
	
					<?php echo $this->Form->create('User', array('id' => 'UserAddForm','inputDefaults' => array('label' => false, 'div' => false), 'class' => 'form form-horizontal')); ?>
						<div class="panel-body">
							<div class="form-group">
								<?php echo $this->Form->label('username', 'Username', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">							
								<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter login name of the user', 'maxlength' => '20')); ?>			
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('name', 'Name', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'First Name | Last Name', 'maxlength' => '30')); ?>			
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('password', 'Password', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter Password', 'maxlength' => '20')); ?>
								<div id="UserPasswordMessage"></div>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('password_confirm', 'Repeat', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('password_confirm', array('type'=>'password', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'maxlength' => '20')); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('email', 'Email', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'youremail@yourdomain.com', 'maxlength' => '100')); ?>
								</div>	
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('address', 'Address', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">
								<?php echo $this->Form->input('address', array('class' => 'form-control', 'placeholder' => 'Write your address', 'maxlength' => '255')); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('group_id', 'Group', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">
									<?php echo $this->Form->input('group_id'); ?>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
							<?php echo $this->Form->button('Create user', array('id' => 'UserAddFormSubmit', 'type' => 'submit', 'class'=>'btn btn-primary pull-right')); ?>
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
									<?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?>
								</div>
								<div class="item">
									<i class="icon-reorder"></i>
									<?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('class' => '')); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

	
