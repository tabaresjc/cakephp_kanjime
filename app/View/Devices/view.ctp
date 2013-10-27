
<div class="row-fluid">
	<div class="span9">		
		<div class="devices view">
			<h2><?php  echo __('Device'); ?></h2>

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
		<div class="actions">
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		</div><!-- .actions -->
	</div><!-- #sidebar .span3 -->	

</div><!-- #page-container .row-fluid -->
