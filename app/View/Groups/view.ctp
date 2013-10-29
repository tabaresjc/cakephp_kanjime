<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
	<div class="row header">		
		<h3>Details for group <?php echo h($group['Group']['name']); ?></h3>
	</div>
	<div class="row">
		<!-- left column -->
		<div class="col-md-9">
			<div class="groups view">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo __('Details'); ?></div>
					<table class="table table-striped table-condensed">
						<tr>
							<td class="span2"><strong><?php echo __('Id'); ?></strong></td>
							<td><?php echo h($group['Group']['id']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td><?php echo h($group['Group']['created']); ?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Modified'); ?></strong></td>
							<td><?php echo h($group['Group']['modified']); ?></td>
						</tr>
					</table>
					<!-- .table table-striped table-bordered -->
				</div>
			</div>
			<?php if (!empty($group['User'])): ?>
			<div class="related">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo __('Related Users'); ?></div>
					<table class="table table-striped table-condensed">
					  <?php
					  $i = 0;
					  foreach ($group['User'] as $user): 
					  ?>
					  <tr>
						<td>
						  <?php echo $this->Html->link($user['name'], array('action' => 'edit', $user['id']), array('class' => 'name')); ?>
						</td>
						<td class="align-right">
						  <div class="btn-group">
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-primary')); ?><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
						  </div>
						</td>
					  </tr>
					  <?php endforeach; ?>
					</table>
					<!-- .table table-striped table-bordered -->
				</div>				
			</div>
			<?php endif; ?>
		</div>			
		<!-- side right column -->
		<div class="col-md-3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Groups'), array('action' => 'index'), array('class' => '')); ?>
							</div>
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id']), array('class' => '')); ?>
							</div>						
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
							</div>
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?>
							</div>
							
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?>
							</div>							
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?>
							</div>								
						</div>
					</div>
				</div>
			</div>				
		</div>
	<div>


