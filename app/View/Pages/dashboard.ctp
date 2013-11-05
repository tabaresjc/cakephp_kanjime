<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/index.css" type="text/css" media="screen" />';
	$this->end();	
?>

<?php  $this->start('main-stats'); ?>
	<div class="row stats-row">
		<div class="col-md-3 col-sm-3 stat">
			<div class="data">
				<span class="number"><?php echo $stats['count_publish_names']; ?></span>
				names
			</div>
			<span class="date"><?php echo "draft {$stats['count_draft_names']}"; ?></span>
		</div>
		
		<div class="col-md-3 col-sm-3 stat">
			<div class="data">
				<span class="number"><?php echo $stats['count_devices']; ?></span>
				devices
			</div>
			<span class="date"><?php echo "allowed {$stats['count_enabled_devices']}"; ?></span>
		</div>
		
		<div class="col-md-3 col-sm-3 stat">
			<div class="data">
				<span class="number"><?php echo $stats['count_notifications']; ?></span>
				notifications
			</div>
			<span class="date"><?php echo "stopped {$stats['count_notifications_stopped']}"; ?></span>
		</div>
		
		<div class="col-md-3 col-sm-3 stat">
			<div class="data">
				<span class="number"><?php echo $this->Number->currency($stats['sales_month'], 'USD'); ?></span>
				sales
			</div>
			<span class="date">Pending <?php echo $this->Number->currency($stats['sales_pending'], 'USD'); ?></span>
		</div>
	</div>
<?php $this->end(); ?>

	<div class="row">
		<div class="col-md-4">
		  <div class="thumbnail">
			<img style="width: 128px; height: 128px;" src="/img/asian.png" />
			<div class="caption">
			  <h3 style="text-align:center">Names</h3>
			  <p>This module allows you to enter foreign names to be seen in the app, when you create a new name, make sure to enter the kanji and the katakana</p>
			  <p>
			  <?php echo $this->Html->link(__('List Names'), array('controller' => 'collections', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
			  <?php echo $this->Html->link(__('Add Name'), array('controller' => 'collections', 'action' => 'add'),  array('class' => 'btn btn-default pull-right')); ?>		  
			</div>
		  </div>
		</div>
		<div class="col-md-4">
		  <div class="thumbnail">
			<img style="width: 128px; height: 128px;" src="/img/users.png" />
			<div class="caption">
			  <h3  style="text-align:center">Users</h3>
			  <p>This module allows you to create, edit and delete the users that can access this website</p><br/>
			  <p>
			  <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
			  <?php echo $this->Html->link(__('Add User'), array('controller' => 'users', 'action' => 'add'),  array('class' => 'btn btn-default pull-right')); ?>
			  
			</div>
		  </div>
		</div>
		<div class="col-md-4">
		  <div class="thumbnail">
			<img style="width: 128px; height: 128px;" src="/img/paypal.png" />
			<div class="caption">
			  <h3  style="text-align:center">Orders</h3>
			  <p>This module allows users manage and display lists of transactions made in the paypal account</p><br/>
			  <p>
			  <?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
			  </p>
			</div>
		  </div>
		</div>
	</div>

