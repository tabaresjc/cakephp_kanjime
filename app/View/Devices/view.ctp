<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
<div class="row-fluid">	
	<div class="span12">
		<h2><?php  echo __('Device'); ?></h2>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">		
		<div class="devices view">
			

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($device['Device']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Device Token'); ?></strong></td>
		<td>
			<?php echo h($device['Device']['device_token']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Enabled'); ?></strong></td>
		<td>
			<?php echo h($device['Device']['enabled']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($device['Device']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($device['Device']['modified']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->
	<div class="span3">	
		<div class="pop-dialog full">
			<div class="body">                        
				<div class="settings">
					<div class="items">
						<div class="item">
							<i class="icon-reorder"></i>
							<?php echo $this->Html->link(__('List Devices'), array('action' => 'index'), array('class' => '')); ?>
						</div>
						<div class="item">
							<i class="icon-edit icon-formatted"></i>
							<?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id']), array('class' => '')); ?>
						</div>						
						<div class="item">
							<i class="icon-trash icon-formatted"></i>
							<?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?>
						</div>
						<div class="item">
							<i class="icon-plus icon-formatted"></i>
							<?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #sidebar .span3 -->	


</div><!-- #page-container .row-fluid -->
