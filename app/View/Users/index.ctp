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
				<?php echo $this->Form->create(null, array('controller'=>'users','action'=>'search','type'=>'get', 'class' => 'span5', 'id'=>'UserSearchForm','inputDefaults' => array('label' => false, 'div' => false))); ?>
				<div class="input-append">
					<?php echo $this->Form->input('query', array('value'=> $query ,'class'=>'span12' , 'placeholder'=>'Type a user\'s name...')); ?>
					<?php echo $this->Form->button('Search', array('id'=>'UserSearchSubmit','type' => 'submit', 'class'=>'btn')); ?>
				</div>
				<?php echo $this->Form->end(); ?>
				<?php echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'add'), array('class'=>'btn-flat success pull-right')); ?>
			</div>
		</div>
		<!-- Users table -->
		<div class="row-fluid table">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="span3 sortable"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th class="span3 sortable"><span class="line"></span><?php echo $this->Paginator->sort('email', __('Email')); ?></th>
						<th class="span2 sortable"><span class="line"></span><?php echo $this->Paginator->sort('group_id', __('Group')); ?></th>
						<th class="span2 sortable"><span class="line"></span><?php echo $this->Paginator->sort('created', __('Signed Up')); ?></th>
						<th class="span2"><span class="line"></span></th>
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
						<td>
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
