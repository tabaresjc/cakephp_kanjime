<div class="row-fluid header">	
	<h2><?php echo __('Devices'); ?></h2>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="devices index">		
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
						<td><?php echo h($device['Device']['id']); ?></td>
						<td><?php echo h($device['Device']['device_token']); ?></td>
						<td><?php echo h($device['Device']['enabled'] ? 'Yes' : 'No'); ?></td>
						<td><?php echo h($device['Device']['created']); ?></td>
						<td><?php echo h($device['Device']['modified']); ?></td>
						<td>
							<div class="btn-group">
								<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $device['Device']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
								<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $device['Device']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete %s?', $device['Device']['id'])); ?>
							</div>
						</td>		
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<p>
				<small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>
				</small>
			</p>

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
	</div><!-- #page-content .span12 -->

</div><!-- #page-container .row-fluid -->
