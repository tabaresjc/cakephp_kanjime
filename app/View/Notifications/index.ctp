	<div class="row header">
		<div class="col-md-12">
			<h3><?php echo __('Notifications'); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="notifications index">
				<table class="table table-bordered table-condensed">
					<thead>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('message'); ?></th>
						<th><?php echo $this->Paginator->sort('settings'); ?></th>
						<th><?php echo $this->Paginator->sort('status'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><th class="actions"><?php echo __('Actions'); ?></th>
					</thead>
					<tbody>
						<?php foreach ($notifications as $notification): ?>
						<tr>
							<td><?php echo h($notification['Notification']['id']); ?></td>
							<td><?php echo h($notification['Notification']['message']); ?></td>
							<td><?php echo h($notification['Notification']['settings']); ?></td>
							<td><?php echo h($notification['Notification']['status']); ?></td>
							<td><?php echo h($notification['Notification']['created']); ?></td>
							<td>
								<div class="btn-group">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $notification['Notification']['id']), array('class' => 'btn')); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notification['Notification']['id']), array('class' => 'btn btn-primary')); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notification['Notification']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>					
						</tbody>
				</table>
				<div>
					<p><small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>
					
					<ul class="pagination inverse pull-right">
						<?php
						echo $this->Paginator->prev('&#8249;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
						echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						echo $this->Paginator->next('&#8250;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
						?>
					</ul>
				</div><!-- .pagination -->
			</div><!-- .index -->
		</div><!-- .col-md-12 -->	
	</div>

