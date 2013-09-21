<?php
	$this->append('custom_script');
		echo $this->Html->script('libs/kanjime');
	$this->end();
?>


	<div class="row-fluid header">
		<div id="message_placeholder">
		</div>		
		<h3><?php echo __('Create a new name'); ?></h3>
	</div>
	<div class="row-fluid form-wrapper">
		<!-- left column -->
		<div class="span12 with-sidebar">			
			<div id="kanji_me_create" class="collections form">
			  <?php echo $this->Form->create('Collection', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
			  <fieldset>
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
				<div class="control-group">
				  <?php echo $this->Form->label('status', 'Status', array('class' => 'control-label'));?>
				  <div class="controls">
					<?php echo $this->Form->input('status', array('options' => $this->Collection->getStatusDescriptor(),'value'=>'2')); ?>
				  </div>
				  <!-- .controls -->
				</div>
				<!-- .control-group -->
				<?php echo $this->Form->hidden('body', array('value' => 'kanji:null', 'id' => 'kanjime_body')); ?>
				<!-- .control-group -->
			  </fieldset>
			  <div class="well">
				<div class="btn-toolbar">
					<?php echo $this->Html->link('Breakdown', 'javascript:void(0)', array('id' => 'kanji_me_breakdown', 'class' => 'btn btn-large btn-warning')); ?>
					<?php echo $this->Form->submit('Submit', array('id' => 'SubmitFormKanji', 'class' => 'btn btn-large btn-primary pull-right', 'div' => false)); ?>
				</div>
			  </div>
			  <?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<!-- left column -->
		<div class="span6">
			<div id="kanjime_placeholder" class="">
			</div>
		</div>			
		<!-- side right column -->
		<div class="span6">
			<div id="kanjime_preview" style="display:none;" class="well">
				<div class="kanjime_preview_body">
				</div>
			</div>				
		</div>		
	<div>




