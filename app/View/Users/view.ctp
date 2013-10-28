<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
	<div class="row-fluid header">
		<div id="message_placeholder">
		</div>		
		<h3><?php echo h($user['User']['name']); ?></h3>
	</div>
	<div class="row-fluid">
		<!-- left column -->
		<div class="span9">
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
			<?php echo __('Account SID'); ?>
			</strong>
			</td>
			<td><?php echo h($user['User']['account_sid']); ?></td>
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
			<?php echo __('Name'); ?>
			</strong>
			</td>
			<td><?php echo h($user['User']['name']); ?></td>
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
			<?php echo __('Group'); ?>
			</strong>
			</td>
			<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), array('class' => '')); ?></td>
			</tr>
			<tr>
			<td>
			<strong>
			<?php echo __('Created'); ?>
			</strong>
			</td>
			<td><?php echo $this->Time->format(DATETIME_FORMAT,$user['User']['created']); ?></td>
			</tr>
			<tr>
			<td>
			<strong>
			<?php echo __('Modified'); ?>
			</strong>
			</td>
			<td><?php echo $this->Time->format(DATETIME_FORMAT,$user['User']['modified']); ?></td>
			</tr>
			</table>
		</div>			
		<!-- side right column -->
		<div class="span3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<div class="thumbnail" style="display: inline-block; margin:0 auto;">
									<?php echo $this->Html->getAvatarForEmail($user['User']['email'],128); ?>
								</div>	
							</div>						
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?>
							</div>
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?>
							</div>
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
	<div>


