
<div class="row-fluid">
	<div class="span12">
		<div class="orders index">		
			<h2><?php echo __('Orders'); ?></h2>			
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="span3 sortable"><?php echo $this->Paginator->sort('payment_key', 'Id'); ?></th>
						<th class="span3 sortable"><?php echo $this->Paginator->sort('name'); ?></th>
						<th class="span1 sortable hid"><?php echo $this->Paginator->sort('payment_status', 'Status'); ?></th>
						<th class="span1 sortable hid"><?php echo $this->Paginator->sort('payment_amount', 'Amount'); ?></th>
						<th class="sortable hid"><?php echo $this->Paginator->sort('modified', 'Updated'); ?></th>
						<th><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $order): ?>
					<tr>
						<td><?php echo h($order['Order']['payment_key']); ?></td>
						<td>
							<p><strong><?php echo h($order['Order']['name']); ?></strong></p>
							<p><?php echo h($order['Order']['email']); ?></p>
						</td>
						<td><?php echo h($order['Order']['payment_status']); ?></td>
						<td><?php echo h($order['Order']['payment_amount']) . ' ' . h($order['Order']['payment_currency']); ?></td>
						<td><?php echo h($order['Order']['modified']); ?></td>
						<td class="actions">
							<div class="btn-group">
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id']), array('class' => 'btn')); ?>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-primary')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
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
	</div>
</div><!-- #page-container .row-fluid -->
