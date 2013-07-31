<?php
	$this->append('custom_css');
	echo "\t" . '<!-- this page specific styles -->' . "\n";
	echo "\t" . '<link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen" />' . "\n";
	$this->end();	
	$this->append('custom_script');
	echo "\n\t". $this->Html->script('libs/users');
	$this->end();
?>
	<div class="new-user">
		<div class="row-fluid header">
			<h3><?php echo __('Create a new user'); ?></h3>
		</div>
		<div class="row-fluid form-wrapper">
			<!-- left column -->
			<div class="span9 with-sidebar">
				<div class="container">
					<?php echo $this->Form->create('User', array('id' => 'UserAddForm','inputDefaults' => array('label' => false, 'div' => false), 'class' => 'new_user_form')); ?>
						<div class="span12 field-box">
							<?php echo $this->Form->input('username', array('label' => 'Username:', 'class' => 'span7', 'placeholder' => 'Enter login name of the user', 'maxlength' => '20')); ?>			
						</div>
						<div class="span12 field-box">
							<?php echo $this->Form->input('name', array('label' => 'Name:', 'class' => 'span7', 'placeholder' => 'First Name | Last Name', 'maxlength' => '30')); ?>			
						</div>
						<div class="span12 field-box">
							<?php echo $this->Form->input('password', array('label' => 'Password:', 'type' => 'password', 'class' => 'span7', 'placeholder' => 'Enter Password', 'maxlength' => '20')); ?>
							<div id="UserPasswordMessage"></div>
						</div>
						<div class="span12 field-box">
							<?php echo $this->Form->input('password_confirm', array('label' => 'Repeat:', 'type'=>'password', 'class' => 'span7', 'placeholder' => 'Confirm Password', 'maxlength' => '20')); ?>
						</div>
						<div class="span12 field-box">
							<?php echo $this->Form->input('email', array('label' => 'Email:', 'type' => 'text', 'class' => 'span7', 'placeholder' => 'youremail@yourdomain.com', 'maxlength' => '100')); ?>
						</div>	
						<div class="span12 field-box">
							<?php echo $this->Form->input('address', array('label' => 'Address:','class' => 'span7', 'placeholder' => 'Write your address', 'maxlength' => '255')); ?>
						</div>
						<div class="span12 field-box">
							<label>Group:</label>
							<div class="ui-select">
								<?php echo $this->Form->input('group_id'); ?>
							</div>
						</div>
						<div class="span11 field-box actions">
							<hr/>
							<?php echo $this->Html->Link('Cancel', array('controller'=>'users','action'=>'index'),  array('class' => 'btn btn-danger')); ?>
							<?php echo $this->Form->button('Create user', array('id' => 'UserAddFormSubmit', 'type' => 'submit', 'class'=>'btn-glow primary pull-right')); ?>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
			<!-- side right column -->
			<div class="span3 form-sidebar pull-right">
				<h6><?php echo __('Import') ?></h6>
				<ul>
					<li><a href="javascript:void(0);">Upload a vCard file</a></li>
					<li><a href="javascript:void(0);">Import from a CSV file</a></li>
					<li><a href="javascript:void(0);">Import from an Excel file</a></li>
				</ul>

			</div>
		</div>
	</div>
	
