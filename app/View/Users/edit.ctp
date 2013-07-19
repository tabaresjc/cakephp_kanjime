<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
		</li>
		<li>
		  <?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?>
		</li>
	  </ul>
	  <!-- .nav nav-list bs-docs-sidenav -->
	</div>
	<!-- .actions -->
  </div>
  <!-- #sidebar .span3 -->
  <div id="page-content" class="span9">
	<div class="users form">
	  <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
	  <fieldset>
		<h2>
		  <?php echo __('Edit User'); ?>
		</h2>
		<div class="control-group">
		  <?php echo $this->Form->label('username', 'Username', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('username', array('class' => 'span12')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<!-- .control-group -->
		<div class="control-group">
		  <?php echo $this->Form->label('password', 'Password', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('password', array('class' => 'span12', 'type' => 'password', 'value' => '')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<!-- .control-group -->
		<div class="control-group">
		  <?php echo $this->Form->label('role', 'role', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('role', array( 'options' => array('admin' => 'Admin', 'manager' => 'Manager', 'operator' => 'Operator', 'serveradmin' => 'Server Admin'), 'class' => 'span12')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<?php echo $this->Form->hidden('id'); ?>
		<!-- .control-group -->
	  </fieldset>
	  <div class="well">
		<div class="btn-toolbar">
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary pull-right', 'div' => false)); ?>
		</div>
		<div class="clearfix"></div>
	  </div>
	  <?php echo $this->Form->end(); ?>
	</div>
  </div>
  <!-- #page-content .span9 -->
</div>
<!-- #page-container .row-fluid -->

