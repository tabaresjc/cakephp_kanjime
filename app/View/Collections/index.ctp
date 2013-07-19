<?php
        $this->Html->addCrumb(__('List Names'), null);
?>

<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Html->link(__('New Name'), array('action' => 'add'), array('class' => '')); ?>
		</li>
	  </ul>
	  <!-- .nav nav-list bs-docs-sidenav -->
	</div>
	<!-- .actions -->
  </div>
  <!-- #sidebar .span3 -->
  <div id="page-content" class="span9">
	<div class="collections index">
	  <h2>
		<?php echo __('Names'); ?>
	  </h2>
	  <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
		<tr>
		  <th style="width:50px;">
			<?php echo $this->Paginator->sort('id', '#'); ?>
		  </th>
		  <th style="width:15%;">
			<?php echo $this->Paginator->sort('title', 'Name'); ?>
		  </th>
		  <th style="width:15%;">
			<?php echo $this->Paginator->sort('subtitle', 'Kanji'); ?>
		  </th>
		  <th style="width:15%;">
			<?php echo $this->Paginator->sort('description', 'Katakana'); ?>
		  </th>
		  <th>
			<?php echo $this->Paginator->sort('created', 'Created'); ?>
		  </th>
		  <th class="actions">
			<?php echo __('Actions'); ?>
		  </th>
		</tr><?php
				foreach ($collections as $collection): ?>
		<tr>
		  <td>
			<?php echo h($collection['Collection']['id']); ?>
		  </td>
		  <td>
			<?php echo h($collection['Collection']['title']); ?>
		  </td>
		  <td>
			<?php echo h($collection['Collection']['subtitle']); ?>
		  </td>
		  <td>
			<?php echo h($collection['Collection']['description']); ?>
		  </td>
		  <td>
			<?php echo $this->Time->format('F jS, Y H:i', $collection['Collection']['created']); ?>
		  </td>
		  <td class="actions">
			<div class="btn-group" style="margin:0 auto;">
			  <?php echo $this->Html->link(__('View'), array('action' => 'view', $collection['Collection']['id']), array('class' => 'btn')); ?>
			  <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $collection['Collection']['id']), array('class' => 'btn btn-primary')); ?>
			  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $collection['Collection']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $collection['Collection']['id'])); ?>
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
