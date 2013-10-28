<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
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
								<th><?php echo $this->Paginator->sort('name'); ?></th>
								<th class="hid"><?php echo $this->Paginator->sort('created'); ?></th>
								<th class="hid"><?php echo $this->Paginator->sort('modified'); ?></th>
								<th class="actions"></th>
							</tr>
							<?php
							foreach ($groups as $group): ?>
								<tr>
								<td><?php echo $this->Html->link($group['Group']['name'], array('action' => 'view', $group['Group']['id']), array('class' => 'title')); ?></td>
								<td class="hid"><?php echo h($group['Group']['created']); ?></td>
								<td class="hid"><?php echo h($group['Group']['modified']); ?></td>
								<td>
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
			<div class="span3">	
				<div class="pop-dialog full">
					<div class="body">                        
						<div class="settings">
							<div class="items">
								<div class="item">
									<i class="icon-plus icon-formatted"></i>
									<?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?>
								</div>
								<div class="item">
									<i class="icon-user icon-formatted"></i>
									<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

