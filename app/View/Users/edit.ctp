<?php

?>
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
            <li>
              <?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?>
            </li>
            <li>
              <?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?>
            </li>
          </ul>
          <!-- .nav nav-list bs-docs-sidenav -->
        </div>
        <!-- .actions -->
      </div>
      <!-- #sidebar .span3 -->
      <div id="page-content" class="span9">
        <div class="users form">
          <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal', 'autocomplete'=>'off')); ?>
          <fieldset>
            <h2>
              <?php echo __('Edit User'); ?>
            </h2>

            <div class="control-group">
              <?php echo $this->Form->label('uname', 'Username', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('uname', array('class' => 'form-control', 'value' => $this->Form->value('User.username'), 'disabled' => '1')); ?>
              </div>
              <!-- .controls -->
            </div>
			<!-- .control-group -->
            <div class="control-group">
              <?php echo $this->Form->label('name', 'Name', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('name', array( 'class' => 'span5', 'placeholder' => 'First Name and Last Name')); ?>
              </div>
              <!-- .controls -->
            </div>
            <!-- .control-group -->
            <div class="control-group">
              <?php echo $this->Form->label('blank_password', 'Password', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('blank_password', array('class' => 'span5', 'type' => 'password', 'placeholder' => 'Enter Password')); ?>
              </div>
              <!-- .controls -->
            </div>
			<div class="control-group">
			  <?php echo $this->Form->label('blank_password_confirm', 'Confirm password', array('class' => 'control-label'));?>
			  <div class="controls">
				<?php echo $this->Form->input('blank_password_confirm', array('type'=>'password', 'class' => 'span5', 'placeholder' => 'Confirm Password')); ?>
			  </div>
			  <!-- .controls -->
			</div>			
            <!-- .control-group -->
			<div class="control-group">
              <?php echo $this->Form->label('email', 'Email', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('email', array( 'class' => 'span5', 'placeholder' => 'youremail@yourdomain.com')); ?>
              </div>
              <!-- .controls -->
            </div>
            <!-- .control-group -->
            <div class="control-group">
              <?php echo $this->Form->label('address', 'Address', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('address', array( 'class' => 'span7', 'placeholder' => 'Write your address')); ?>
              </div>
              <!-- .controls -->
            </div>
            <!-- .control-group -->
            <div class="control-group">
              <?php echo $this->Form->label('group_id', 'Group', array('class' => 'control-label'));?>
              <div class="controls">
                <?php echo $this->Form->input('group_id', array('class' => 'span5')); ?>
              </div>
              <!-- .controls -->
            </div>
			<?php echo $this->Form->hidden('id'); ?>
			<?php echo $this->Form->hidden('username'); ?>
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
