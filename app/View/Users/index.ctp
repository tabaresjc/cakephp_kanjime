<?php
	$this->append('custom_css');
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/user-list.css" type="text/css" media="screen" />';
	$this->end();	
	$first_class = 'first';
?>
	<div class="users-list">
		<div class="row header">
			<h3><?php echo __('List of Users'); ?></h3>
		</div>
		<div class="row">			
			<div class="col-md-8">
				<?php echo $this->Form->create(null, array('controller'=>'users','action'=>'search','type'=>'get', 'class' => 'col-md-5 pull-right', 'id'=>'UserSearchForm','inputDefaults' => array('label' => false, 'div' => false))); ?>
					<div class="input-group">
						<?php echo $this->Form->input('query', array('value'=> $query ,'class'=>'form-control' , 'placeholder'=>'Type a user\'s name...')); ?>
						<span class="input-group-btn">
							<?php echo $this->Form->button('Search', array('id'=>'UserSearchSubmit','type' => 'submit', 'class'=>'btn btn-default')); ?>
						</span>						
					</div><!-- /input-group -->
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'add'), array('class'=>'btn-flat success pull-right')); ?>
			</div>
		</div>
		<br/><br/>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-bordered table-condensed">
					<thead>
						<tr>
							<th class="col-md-3 sortable"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
							<th class="col-md-3 sortable visible-lg"><?php echo $this->Paginator->sort('email', __('Email')); ?></th>
							<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('group_id', __('Group')); ?></th>
							<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('created', __('Signed Up')); ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($users as $user): ?>
						<tr class="<?php echo $first_class; ?>">
							<td>
								<?php echo $this->Html->getAvatarForEmail($user['User']['email'],64,"img-circle avatar hidden-phone"); ?>
								<?php echo $this->Html->link($user['User']['name'], array('action' => 'view', $user['User']['id']), array('class' => 'name')); ?>
								<span class="subtext"><?php echo $user['User']['username']; ?></span>
							</td>
							<td class="visible-lg"><?php echo h($user['User']['email']); ?></td>
							<td class="visible-lg">
								<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
							</td>						
							<td class="visible-lg"><?php echo $this->Time->format(DATETIME_FORMAT, $user['User']['created']); ?></td>
							<td>
								<div class="btn-group">
									<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary', 'escape'=>false)); ?>
									<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger', 'escape'=>false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
								</div>
							</td>
						</tr>
						<?php $first_class = ''; ?>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div>
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
