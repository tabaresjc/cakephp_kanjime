<?php

?>
	<div class="row-fluid header">
		<div id="message_placeholder">
		</div>		
		<h3><?php echo h($group['Group']['name']); ?></h3>
	</div>
	<div class="row-fluid">
		<!-- left column -->
		<div class="span9">
			<div class="groups view">
				<table class="table table-striped table-bordered">
				<tr>
					<td class="span2"><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($group['Group']['id']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Name'); ?></strong></td>
					<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Created'); ?></strong></td>
					<td><?php echo h($group['Group']['created']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Modified'); ?></strong></td>
					<td><?php echo h($group['Group']['modified']); ?></td>
				</tr>
			</table>
			<!-- .table table-striped table-bordered -->

			</div><!-- .view -->


			<div class="related">

				<h3><?php echo __('Related Users'); ?></h3>

				<?php if (!empty($group['User'])): ?>

				<table class="table table-striped table-bordered">
				<tr>
					<th class="span2"><?php echo __('Name'); ?></th>		
					<th></th>
				</tr>
				<?php
					$i = 0;
					foreach ($group['User'] as $user): ?>
				<tr>
					<td><?php echo $this->Html->link($user['name'], array('action' => 'edit', $user['id']), array('class' => 'name')); ?></td>
					<td class="align-right">
						<div class="btn-group">
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-primary')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
						</div>
					</td>				
				</tr>
				<?php endforeach; ?>
				</table><!-- .table table-striped table-bordered -->

				<?php endif; ?>
			</div>
		</div>			
		<!-- side right column -->
		<div class="span3">
			<h6><?php echo __('What you can do'); ?></h6>
			<ul class="nav nav-list bs-docs-sidenav">			
				<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id']), array('class' => '')); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index'), array('class' => '')); ?> </li>
				<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
			</ul>
	
		</div>		
	<div>


