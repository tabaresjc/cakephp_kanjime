<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
	<div class="row header">		
		<h3>Details for Order <?php echo h($order['Order']['payment_key']); ?></h3>
	</div>
	<div class="row">
		<div class="col-md-9">		
			<div class="panel panel-primary">
				<div class="panel-heading">Details</div>
				<table class="table table-striped table-condensed">
				  <tr>
					<td class="col-md-3">
					  <strong>
						<?php echo __('Id'); ?>
					  </strong>
					</td>
					<td>
					  <?php echo h($order['Order']['id']); ?>
					</td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Name'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['name']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Email'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['email']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Comments'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['comments']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Kind'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_kind']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Key'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_key']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Status'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_status']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Description'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_description']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Amount'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_amount']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Currency'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_currency']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Payment Env'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['payment_env']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Created'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['created']); ?> </td>
				  </tr>
				  <tr>
					<td>
					  <strong>
						<?php echo __('Modified'); ?>
					  </strong>
					</td>
					<td><?php echo h($order['Order']['modified']); ?> </td>
				  </tr>
				</table>
				<!-- .table table-striped table-bordered -->
			</div>
		</div><!-- #page-content .span9 -->
		<div class="col-md-3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?>
							</div>
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id']), array('class' => '')); ?> 
							</div>						
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
							</div>
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo $this->Html->link(__('New Order'), array('action' => 'add'), array('class' => '')); ?>
							</div>							
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div><!-- #page-container .row-fluid -->
