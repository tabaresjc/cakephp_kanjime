<?php
	$this->append('custom_css');
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/user-list.css" type="text/css" media="screen" />';
	$this->end();	
	$first_class = 'first';
?>


	<div class="users-list">
		<div class="row-fluid header">
			<h3><?php echo __('Users'); ?></h3>
			<div class="span10 pull-right">
				<input type="text" class="span5 search" placeholder="Type a user's name...">
				
				<!-- custom popup filter -->
				<!-- styles are located in css/elements.css -->
				<!-- script that enables this dropdown is located in js/theme.js -->
				<div class="ui-dropdown">
					<div class="head" data-toggle="tooltip" title="Click me!">
						Filter users
						<i class="arrow-down"></i>
					</div>  
					<div class="dialog">
						<div class="pointer">
							<div class="arrow"></div>
							<div class="arrow_border"></div>
						</div>
						<div class="body">
							<p class="title">
								Show users where:
							</p>
							<div class="form">
								<select>
									<option>Name</option>
									<option>Email</option>
									<option>Number of orders</option>
									<option>Signed up</option>
									<option>Last seen</option>
								</select>
								<select>
									<option>is equal to</option>
									<option>is not equal to</option>
									<option>is greater than</option>
									<option>starts with</option>
									<option>contains</option>
								</select>
								<input type="text" />
								<a class="btn-flat small">Add filter</a>
							</div>
						</div>
					</div>
				</div>
				<?php echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'add'), array('class'=>'btn-flat success pull-right')); ?>
			</div>
		</div>
		<!-- Users table -->
		<div class="row-fluid table">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="span3 sortable"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th class="span3 sortable"><?php echo $this->Paginator->sort('email', __('Email')); ?></th>
						<th class="span2 sortable"><?php echo $this->Paginator->sort('group_id', __('Group')); ?></th>
						<th class="span2 sortable"><?php echo $this->Paginator->sort('created', __('Signed Up')); ?></th>
						<th class="span2"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr class="<?php echo $first_class; ?>">
						<td>
							<img src="/admin/img/<?php echo strtolower($user['Group']['name']);?>_64.png" class="img-circle avatar hidden-phone" />
							<?php echo $this->Html->link($user['User']['name'], array('action' => 'edit', $user['User']['id']), array('class' => 'name')); ?>
							<span class="subtext"><?php echo $user['User']['username']; ?></span>
						</td>
						<td><?php echo h($user['User']['email']); ?></td>
						<td class="hid">
							<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
						</td>						
						<td><?php echo $this->Time->format(DATETIME_FORMAT, $user['User']['created']); ?></td>
						<td class="align-right">
							<div class="btn-group">
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
							</div>
						</td>
					</tr>
					<?php $first_class = ''; ?>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
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
