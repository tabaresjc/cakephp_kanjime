<?php
	$this->append('custom_css');
	echo "\n";
	echo '    <!-- this page specific styles -->' . "\n";
	echo '    <link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
	<div class="row header">		
		<h3><?php  echo __('Notification'); ?></h3>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="notifications view">
				<div class="panel panel-primary">
					<div class="panel-heading">Details</div>
					<table class="table table-striped table-condensed">
						
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td><?php echo h($notification['Notification']['id']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Message'); ?></strong></td>
							<td><?php echo h($notification['Notification']['message']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Settings'); ?></strong></td>
							<td><?php echo h($notification['Notification']['settings']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Status'); ?></strong></td>
							<td><?php echo h($notification['Notification']['status']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td><?php echo h($notification['Notification']['created']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Updated'); ?></strong></td>
							<td><?php echo h($notification['Notification']['updated']); ?></td>
						</tr>					
					</table><!-- .table table-striped table-bordered -->
				</div><!-- .panel-primary -->
			</div><!-- .view -->
									
		</div>
		<div class="col-md-3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Notifications'), array('action' => 'index')); ?>
								
							</div>						
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo $this->Html->link(__('Edit Notification'), array('action' => 'edit', $notification['Notification']['id']), array('class' => '')); ?>
							</div>							
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo $this->Form->postLink(__('Delete Notification'), array('action' => 'delete', $notification['Notification']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
							</div>
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo $this->Html->link(__('New Notification'), array('action' => 'add')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
