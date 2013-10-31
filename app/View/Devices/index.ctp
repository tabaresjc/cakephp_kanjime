	<div class="row header">
		<div class="col-md-12">
			<h3><?php echo __('Devices'); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="devices index">		
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th class="visible-lg"><?php echo $this->Paginator->sort('device_token'); ?></th>
							<th class="visible-lg"><?php echo $this->Paginator->sort('enabled'); ?></th>
							<th class="visible-lg"><?php echo $this->Paginator->sort('created'); ?></th>
							<th class="visible-lg"><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($devices as $device): ?>
						<tr>
							<td><?php echo h($device['Device']['id']); ?></td>
							<td class="visible-lg"><?php echo $this->Html->link(h($device['Device']['device_token']), array('action' => 'view', $device['Device']['id']), array('class' => 'title')); ?></td>
							<td class="visible-lg"><?php echo $this->Html->booleanLabel($device['Device']['enabled']); ?></td>
							<td class="visible-lg"><?php echo h($device['Device']['created']); ?></td>
							<td class="visible-lg"><?php echo h($device['Device']['modified']); ?></td>
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


				<div>
					<p>
						<small>
						<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
						));
						?>
						</small>
					</p>
					<ul class="pagination inverse pull-right">
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
