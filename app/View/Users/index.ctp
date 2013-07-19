<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?>
		</li>
	  </ul>
	  <!-- .nav nav-list bs-docs-sidenav -->
	</div>
	<!-- .actions -->
  </div>
  <!-- #sidebar .span3 -->
  <div id="page-content" class="span9">
	<div class="users index">
	  <h2>
		<?php echo __('Users'); ?>
	  </h2>
	  <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
		<tr>
		  <th>
			<?php echo $this->Paginator->sort('id'); ?>
		  </th>
		  <th>
			<?php echo $this->Paginator->sort('username'); ?>
		  </th>
		  <th>
			<?php echo $this->Paginator->sort('role'); ?>
		  </th>
		  <th>
			<?php echo $this->Paginator->sort('created'); ?>
		  </th>
		  <th class="actions">
			<?php echo __('Actions'); ?>
		  </th>
		</tr><?php
										foreach ($users as $user): ?>
		<tr>
		  <td><?php echo h($user['User']['id']); ?></td>
		  <td><?php echo h($user['User']['username']); ?></td>
		  <td><?php echo h($user['User']['role']); ?></td>
		  
		  <td><?php echo $this->Time->format('F jS, Y H:i', $user['User']['created']); ?></td>
		  <td class="actions">
			<div class="btn-group" style="margin:0 auto;">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn')); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</div>
		  </td>
		</tr><?php endforeach; ?>
	  </table>
	  <p>
		<small>
		  <?php
										  echo $this->Paginator->counter(array(
										  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
										  ));
										  ?>
		</small>
	  </p>
	  <div class="pagination">
		<ul>
		  <?php
						  echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
						  echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						  echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				  ?>
		</ul>
	  </div>
	  <!-- .pagination -->
	</div>
	<!-- .index -->
  </div>
  <!-- #page-content .span9 -->
</div>
<!-- #page-container .row-fluid -->
