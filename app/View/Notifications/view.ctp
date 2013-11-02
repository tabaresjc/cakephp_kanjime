
<div class="row-fluid">
	<div class="span9">		
		<div class="notifications view">
			<h2><?php  echo __('Notification'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Message'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['message']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Settings'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['settings']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Status'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['status']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['created']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->
	<div class="span3">
		<div class="actions">
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Notification'), array('action' => 'edit', $notification['Notification']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notification'), array('action' => 'delete', $notification['Notification']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notifications'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notification'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		</div><!-- .actions -->
	</div><!-- #sidebar .span3 -->	

</div><!-- #page-container .row-fluid -->
