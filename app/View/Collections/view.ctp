<?php
	$this->Html->addCrumb(__('List Collections'), array('action' => 'index'));
	$this->Html->addCrumb(__('View Collection'), null);
	$this->start('script');
		echo $this->Html->script('libs/kanjime');
	$this->end();
?>

<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Html->link(__('Edit Name'), array('action' => 'edit', $collection['Collection']['id']), array('class' => '')); ?>
		</li>
		<li>
		  <?php echo $this->Form->postLink(__('Delete Name'), array('action' => 'delete', $collection['Collection']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $collection['Collection']['id'])); ?>
		</li>
		<li>
		  <?php echo $this->Html->link(__('List Names'), array('action' => 'index'), array('class' => '')); ?>
		</li>
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
	<div class="collections view">
	  <h2>
		<?php  echo __('Name'); ?>
	  </h2>
	  <table class="table table-striped table-bordered">
		<tr>
		  <td>
			<strong>
			  <?php echo __('Id'); ?>
			</strong>
		  </td>
		  <td><?php echo h($collection['Collection']['id']); ?>&#160;</td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Name'); ?>
			</strong>
		  </td>
		  <td><?php echo h($collection['Collection']['title']); ?>&#160;</td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Kanji'); ?>
			</strong>
		  </td>
		  <td><?php echo h($collection['Collection']['subtitle']); ?>&#160;</td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Katakana'); ?>
			</strong>
		  </td>
		  <td><?php echo h($collection['Collection']['description']); ?>&#160;</td>
		</tr>

		<tr>
		  <td>
			<strong>
			  <?php echo __('Created'); ?>
			</strong>
		  </td>
		  <td><?php echo $this->Time->format('F jS, Y H:i', $collection['Collection']['created']); ?>&#160;</td>
		</tr>
		<tr>
		  <td>
			<strong>
			  <?php echo __('Modified'); ?>
			</strong>
		  </td>
		  <td><?php echo $this->Time->format('F jS, Y H:i', $collection['Collection']['modified']); ?>&#160;</td>
		</tr>
	  </table>
	  
	  <?php echo $this->Form->hidden('Collection.body', array('id' => 'kanjime_body', 'value'=> $collection['Collection']['body'])); ?>
	  <!-- .table table-striped table-bordered -->
	</div>
	<!-- .view -->
	<div id="kanjime_viewer"></div>
  </div>
  
  <!-- #page-content .span9 -->
</div>
<!-- #page-container .row-fluid -->

