	<div class="row">
		<div class="col-md-12">
			<div class="notifications form">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><?php echo __('Add Notification'); ?></h3></div>			
					<?php echo $this->Form->create('Notification', array( 'action'=>'add', 'type'=>'post', 'inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
						<div class="panel-body">
							<div class="form-group">
								<?php echo $this->Form->label('message', 'Message', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-10">
									<?php echo $this->Form->input('message', array('class' => 'form-control')); ?>
								</div><!-- .col-lg-10 -->
							</div><!-- .form-group -->

							<div class="form-group">
								<?php echo $this->Form->label('badge', 'Badge', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-5">
									<?php echo $this->Form->input('badge', array('class' => 'form-control', 'value'=>'0')); ?>
								</div><!-- .col-lg-10 -->
							</div><!-- .form-group -->
							
							<div class="form-group">
								<?php echo $this->Form->label('minutes', 'Send in (Minutes)', array('class' => 'col-lg-2 control-label'));?>
								<div class="col-lg-5">
									<?php echo $this->Form->input('minutes', array('options'=> $this->Notification->getMinutesOptions(), 'default'=>'1', 'class' => 'form-control')); ?>
								</div><!-- .col-lg-10 -->
							</div><!-- .form-group -->

							<?php echo $this->Form->hidden('settings', array('value' => '')); ?>
							<?php echo $this->Form->hidden('status', array('value' => '1')); ?>						
						</div>
						<div class="panel-footer">
							<?php echo $this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>
							<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-large btn-primary pull-right')); ?>					
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>			
		</div>
	</div>
	<hr/>
	<div class="row">
		
		<div class="col-md-12">
			<h3><?php echo __('Notifications'); ?></h3>
			<div class="notifications index">
				<table class="table table-bordered table-condensed">
					<thead>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th class="visible-lg"><?php echo $this->Paginator->sort('message'); ?></th>
						<th class="visible-lg"><?php echo $this->Paginator->sort('badge'); ?></th>						
						<th ><?php echo $this->Paginator->sort('status'); ?></th>
						<th class="visible-lg"><?php echo $this->Paginator->sort('push_time'); ?></th>
						<th class="visible-lg"><?php echo $this->Paginator->sort('updated'); ?></th>
						<th><?php echo __('Actions'); ?></th>
					</thead>
					<tbody>
						<?php foreach ($notifications as $notification): ?>
						<tr>
							<td><?php echo h($notification['Notification']['id']); ?></td>
							<td class="visible-lg"><?php echo h($notification['Notification']['message']); ?></td>
							<td class="visible-lg"><?php echo h($notification['Notification']['badge']); ?></td>
							<td><span class="<?php echo $this->Notification->getStatusDescriptorClass($notification['Notification']['status']); ?>"><?php echo $this->Notification->getStatusDescriptor($notification['Notification']['status']); ?></span>								
							<td class="visible-lg"><?php echo h($notification['Notification']['push_time']); ?></td>
							<td class="visible-lg"><?php echo h($notification['Notification']['updated']); ?></td>
							<td>
								<div class="btn-group">
									<?php echo $this->Html->link('<i class="icon-search"></i>', array('action' => 'view', $notification['Notification']['id']), array('class' => 'btn btn-default', 'escape'=>false)); ?>
									<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $notification['Notification']['id']), array('class' => 'btn btn-primary', 'escape'=>false)); ?>
									<?php echo $this->Form->postLink('<i class="icon-stop"></i>', array('action' => 'delete', $notification['Notification']['id']), array('class' => 'btn btn-danger', 'escape'=>false), __('Are you sure you want to stop # %s?', $notification['Notification']['id'])); ?>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>					
						</tbody>
				</table>
				<div>
					<p><small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>
					
					<ul class="pagination inverse pull-right">
						<?php
						echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
						echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));
						?>
					</ul>
				</div><!-- .pagination -->
			</div><!-- .index -->
		</div><!-- .col-md-12 -->	
	</div>

