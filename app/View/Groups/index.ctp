
	<div class="row header">
		<div class="col-md-12">
			<h3><?php echo __('Groups'); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
				  <h3 class="panel-title"><?php echo __('New Group'); ?></h3>
				</div>
				<?php echo $this->Form->create('Group', array('action' => 'add', 'type' => 'post', 'inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
					<div class="panel-body">
						<div class="form-group">
							<?php echo $this->Form->label('name', 'Name', array('class' => 'col-lg-2 control-label'));?>
							<div class="col-lg-10">
								<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .form-group -->					
					</div>
					<?php echo $this->Form->hidden('id'); ?>
					<div class="panel-footer">
						<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
						<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-large btn-primary pull-right')); ?>
					</div>			
				<?php echo $this->Form->end(); ?>		
			</div>		
		</div>	
		<div class="col-md-8">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th class="visible-lg"><?php echo $this->Paginator->sort('created'); ?></th>
					<th class="visible-lg"><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"></th>
				</tr>
				<?php
				foreach ($groups as $group): ?>
					<tr>
					<td><?php echo $this->Html->link($group['Group']['name'], array('action' => 'view', $group['Group']['id']), array('class' => 'title')); ?></td>
					<td class="visible-lg"><?php echo h($group['Group']['created']); ?></td>
					<td class="visible-lg"><?php echo h($group['Group']['modified']); ?></td>
					<td>
					<div class="btn-group">
					<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-primary', 'escape'=>false)); ?>
					<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger', 'escape'=>false), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
					</div>
					</td>
					</tr>
				<?php endforeach; ?>
			</table>

			<div>
				<p>
					<small>
						<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
					</small>
				</p>					
				<ul class="pagination inverse pull-right">
					<?php
					echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
					echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					?>
				</ul>
			</div>
		</div>

	</div>



	

