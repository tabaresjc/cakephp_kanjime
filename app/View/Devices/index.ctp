
<div class="row-fluid">
	<div class="span9">
		<div class="devices index">		
			<h2><?php echo __('Devices'); ?></h2>			
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id'); ?></th>
													<th><?php echo $this->Paginator->sort('device_token'); ?></th>
													<th><?php echo $this->Paginator->sort('enabled'); ?></th>
													<th><?php echo $this->Paginator->sort('created'); ?></th>
													<th><?php echo $this->Paginator->sort('modified'); ?></th>
													<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($devices as $device): ?>
	<tr>
		<td><?php echo h($device['Device']['id']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_token']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['enabled']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['created']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $device['Device']['id']), array('class' => 'btn')); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $device['Device']['id']), array('class' => 'btn btn-primary')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $device['Device']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<div class="pagination inverse pull-right">
				<ul>
					<?php
		echo $this->Paginator->prev('&#8249;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next('&#8250;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	</div><!-- #page-content .span9 -->
	<div class="span3">
		<div class="actions">		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add'), array('class' => '')); ?></li>							</ul><!-- .nav nav-list bs-docs-sidenav -->
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
