	<div class="row header">
		<div class="col-md-12">
			<h3><?php echo __('Orders'); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">			
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="span4 sortable"><?php echo $this->Paginator->sort('payment_key', 'Paymend Id'); ?></th>
							<th class="span3 sortable"><?php echo $this->Paginator->sort('name'); ?></th>
							<th class="span2 sortable visible-lg"><?php echo $this->Paginator->sort('payment_status', 'Status'); ?></th>
							<th class="span2 sortable visible-lg"><?php echo $this->Paginator->sort('payment_amount', 'Amount'); ?></th>
							<th class="sortable visible-lg"><?php echo $this->Paginator->sort('modified', 'Updated'); ?></th>
							<th><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $order): ?>
						<tr>
							<td>
								<?php echo $this->Html->link(h($order['Order']['payment_key']), array('action' => 'view', $order['Order']['id'])); ?>
							<td>
								<strong><?php echo h($order['Order']['name']); ?></strong><br/>
								<?php echo h($order['Order']['email']); ?>
							</td>
							<td class="visible-lg"><?php echo h($order['Order']['payment_status']); ?></td>
							<td class="visible-lg"><?php echo h($order['Order']['payment_amount']) . ' ' . h($order['Order']['payment_currency']); ?></td>
							<td class="visible-lg"><?php echo h($order['Order']['modified']); ?></td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
									<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s ?', $order['Order']['payment_key'])); ?>
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
						echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
						echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					?>
					</ul>
				</div><!-- .pagination -->
		</div>
	</div>
