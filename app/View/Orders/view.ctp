
<div class="row-fluid">
	<div class="span9">		
		<div class="orders view">
			<h2><?php  echo __('Order'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Comments'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['comments']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Kind'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_kind']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Key'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_key']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Description'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Amount'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_amount']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Currency'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_currency']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Payment Env'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['payment_env']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->
	<div class="span3">
		<div class="actions">
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		</div><!-- .actions -->
	</div><!-- #sidebar .span3 -->	

</div><!-- #page-container .row-fluid -->
