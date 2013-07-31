<?php
	$this->append('custom_css');
	echo "\t" . '<!-- this page specific styles -->' . "\n";
	echo "\t" . '<link rel="stylesheet" href="/admin/css/compiled/new-user.css" type="text/css" media="screen" />' . "\n";
	$this->end();
?>

	<div class="new-user">
		<div class="row-fluid header">
			<h2><?php echo __('Groups'); ?></h2>
		</div>
		<div class="row-fluid form-wrapper">
			<!-- left column -->
			<div class="span9">
				<div id="page-content">
					<div class="groups index">
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
							<tr>
								<th><?php echo $this->Paginator->sort('id'); ?></th>
								<th><?php echo $this->Paginator->sort('name'); ?></th>
								<th><?php echo $this->Paginator->sort('created'); ?></th>
								<th><?php echo $this->Paginator->sort('modified'); ?></th>
								<th class="actions"></th>
							</tr>
							<?php
							foreach ($groups as $group): ?>
								<tr>
								<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
								<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
								<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
								<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
								<td class="actions">
								<div class="btn-group">
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id']), array('class' => 'btn')); ?>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-primary')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
								</div>
								</td>
								</tr>
							<?php endforeach; ?>
						</table>
						<p>
							<small>
								<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
							</small>
						</p>


						<div class="pagination pull-right">
							<ul>
								<?php
								echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
								echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
								echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
								?>
							</ul>
						</div>
						
					</div>
				</div>				
			</div>
			<!-- side right column -->
			<div class="span3 form-sidebar pull-right">
				<h6><?php echo __('Actions') ?></h6>
				<ul>
					<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?></li>
				</ul>
			</div>
		</div>
	</div>


	

