<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?>
		</li>
		<li>
		  <?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</li>
		<li>
		  <?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?>
		</li>
		<li>
		  <?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?>
		</li>
	  </ul>
	  <!-- .nav nav-list bs-docs-sidenav -->
	</div>
	<!-- .actions -->
  </div>
  <!-- #sidebar .span3 -->
  <div id="page-content" class="span9">
	<div class="users view">
	  <h2>
		<?php  echo __('User'); ?>
	  </h2>
	  <table class="table table-striped table-bordered">
		<tr>
		  <td>
			<strong>
			  <?php echo __('Id'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['id']); ?></td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Name'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['name']); ?></td>
		</tr>		
		<tr>
		  <td>
			<strong>
			  <?php echo __('Username'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['username']); ?></td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Password'); ?>
			</strong>
		  </td>
		  <td>**************************</td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Role'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['role']); ?></td>
		</tr>		
		<tr>
		  <td>
			<strong>
			  <?php echo __('Email'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['email']); ?></td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Address'); ?>
			</strong>
		  </td>
		  <td><?php echo h($user['User']['address']); ?></td>
		</tr>		

		<tr>
		  <td>
			<strong>
			  <?php echo __('Created'); ?>
			</strong>
		  </td>
		  <td><?php echo $this->Time->format('F jS, Y H:i', $user['User']['created']); ?></td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Modified'); ?>
			</strong>
		  </td>
		  <td><?php echo $this->Time->format('F jS, Y H:i', $user['User']['modified']); ?></td>
		</tr>
	  </table>
	  <!-- .table table-striped table-bordered -->
	</div>
	<!-- .view -->
  </div>
  <!-- #page-content .span9 -->
</div>
<!-- #page-container .row-fluid -->

