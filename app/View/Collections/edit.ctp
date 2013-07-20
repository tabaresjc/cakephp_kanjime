<?php
	$this->Html->addCrumb(__('List Names'), array('action' => 'index'));
	$this->Html->addCrumb(__('Edit Name'), null);
	$this->start('script');
		echo $this->Html->script('libs/kanjime');
	$this->end();
?>

<div id="page-container" class="row-fluid">
  <div id="sidebar" class="span3">
	<div class="actions">
	  <ul class="nav nav-list bs-docs-sidenav">
		<li>
		  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Collection.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Collection.id'))); ?>
		</li>
		<li>
		  <?php echo $this->Html->link(__('List Names'), array('action' => 'index')); ?>
		</li>
	  </ul>
	  <!-- .nav nav-list bs-docs-sidenav -->
	</div>
	<!-- .actions -->
  </div>
  <!-- #sidebar .span3 -->
  <div id="page-content" class="span9">
	<div id="kanji_me_updater" class="collections form">
	  <?php echo $this->Form->create('Collection', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
	  <fieldset>
		<h2>
		  <?php echo __('Edit Name'); ?>
		</h2>
		
		<!-- .control-group -->
		<div class="control-group">
		  <?php echo $this->Form->label('title', 'Name', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('title', array('class' => 'span12')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<!-- .control-group -->
		<div class="control-group">
		  <?php echo $this->Form->label('subtitle', 'Kanji', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('subtitle', array('class' => 'span12')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<!-- .control-group -->
		<div class="control-group">
		  <?php echo $this->Form->label('description', 'Katakana', array('class' => 'control-label'));?>
		  <div class="controls">
			<?php echo $this->Form->input('description', array('class' => 'span12')); ?>
		  </div>
		  <!-- .controls -->
		</div>
		<!-- .control-group -->
		<?php echo $this->Form->hidden('body', array('id' => 'kanjime_body')); ?>
		<?php echo $this->Form->hidden('id'); ?>
		<!-- .control-group -->
	  </fieldset>
	  <div class="well">
		<div class="btn-toolbar">
			<?php echo $this->Html->link('Breakdown', 'javascript:void(0)', array('id' => 'kanji_me_breakdown', 'class' => 'btn btn-large btn-warning')); ?>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary pull-right', 'div' => false)); ?>
		</div>
	  </div>
	  <?php echo $this->Form->end(); ?>
	</div>
	<div id="kanjime_placeholder" class="">
	</div>
	<div id="kanjime_preview" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding:10px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 id="myModalLabel">Preview for iPhone</h4>
		</div>
		<div class="modal-body">
		</div>
	</div>
  </div>
  <!-- #page-content .span9 -->
</div>
<!-- #page-container .row-fluid -->

