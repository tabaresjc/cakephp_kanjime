<?php
	$this->Html->addCrumb(__('List Posts'), array('action' => 'index'));
	$this->Html->addCrumb(__('Post'), null);
?>
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
				<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id']), array('class' => '')); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index'), array('class' => '')); ?> </li>
				<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add'), array('class' => '')); ?> </li>	
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="posts view">

			<h2><?php  echo __('Post'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Body'); ?></strong></td>
		<td>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
