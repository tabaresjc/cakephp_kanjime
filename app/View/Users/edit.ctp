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
					  <h3 class="panel-title"><?php echo __('Modify user\'s Information'); ?></h3>
					</div>			
	
					<?php echo $this->Form->create('User', array('id' => 'UserEditForm','inputDefaults' => array('label' => false, 'div' => false), 'class' => 'form form-horizontal', 'autocomplete'=>'off')); ?>
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
								<?php echo $this->Form->label('blank_password', 'Password', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('blank_password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter Password', 'maxlength' => '20')); ?>
								<div id="UserPasswordMessage"></div>
								</div>
								
							</div>
							<div class="form-group">
								<?php echo $this->Form->label('blank_password_confirm', 'Repeat', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">									
								<?php echo $this->Form->input('blank_password_confirm', array('type'=>'password', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'maxlength' => '20')); ?>
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
						<?php echo $this->Form->hidden('id'); ?>
						<?php echo $this->Form->hidden('username'); ?>
						<?php echo $this->Form->hidden('created'); ?>						
						<div class="panel-footer">
							<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
							<?php echo $this->Form->button('Save Changes', array('id' => 'UserEditFormSubmit', 'type' => 'submit', 'class'=>'btn btn-primary pull-right')); ?>
						</div>
						
					<?php echo $this->Form->end(); ?>			
				</div>
			</div>
			<div class="col-md-3">
				<div class="pop-dialog full">
					<div class="body">                        
						<div class="settings">
							<div class="items">
								<div class="item">
									<a href="http://gravatar.com/emails" target="_blank" >
										<?php echo $this->Html->getAvatarForEmail($this->Form->value('User.email'),128); ?>
									</a>
								</div>						
								<div class="item">
									<i class="icon-reorder"></i>
									<?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?>
								</div>
								<div class="item">
									<i class="icon-trash icon-formatted"></i>
									<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), array('class' => ''), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
								</div>							
								<div class="item">
									<i class="icon-plus icon-formatted"></i>
									<?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>


