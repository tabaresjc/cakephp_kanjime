<?php

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
								<th><?php echo $this->Paginator->sort('name'); ?></th>
								<th><?php echo $this->Paginator->sort('created'); ?></th>
								<th><?php echo $this->Paginator->sort('modified'); ?></th>
								<th class="actions"></th>
							</tr>
							<?php
							foreach ($groups as $group): ?>
								<tr>
								<td><?php echo $this->Html->link($group['Group']['name'], array('action' => 'view', $group['Group']['id']), array('class' => 'title')); ?></td>
								<td><?php echo h($group['Group']['created']); ?></td>
								<td><?php echo h($group['Group']['modified']); ?></td>
								<td class="align-right">
								<div class="btn-group">
								<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-primary', 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger', 'escape'=>false), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
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


						<div class="pagination inverse pull-right">
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
				<h6><?php echo __('What you can do'); ?></h6>
				<ul class="nav nav-list bs-docs-sidenav">
					<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?></li>
				</ul>
			</div>
		</div>
	</div>


	

