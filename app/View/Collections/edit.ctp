<?php
	$this->append('custom_script');
		echo $this->Html->script('libs/kanjime');
	$this->end();
?>


	<div class="row header">
		<h3><?php echo __('Edit name'); ?></h3>
	</div>
	<div class="row form-wrapper">
		<!-- left column -->
		<div class="col-md-12">			
			<div id="kanji_me_update" class="collections form">
			  <?php echo $this->Form->create('Collection', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
			  
				<div class="form-group">
				  <?php echo $this->Form->label('title', 'Name', array('class' => 'col-lg-2 control-label'));?>
				  <div class="col-lg-10">
					<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
				  </div>
				  <!-- .col-lg-10 -->
				</div>
				<!-- .form-group -->
				<div class="form-group">
				  <?php echo $this->Form->label('subtitle', 'Kanji', array('class' => 'col-lg-2 control-label'));?>
				  <div class="col-lg-10">
					<?php echo $this->Form->input('subtitle', array('class' => 'form-control')); ?>
				  </div>
				  <!-- .col-lg-10 -->
				</div>
				<!-- .form-group -->
				<div class="form-group">
				  <?php echo $this->Form->label('description', 'Katakana', array('class' => 'col-lg-2 control-label'));?>
				  <div class="col-lg-10">
					<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
				  </div>
				  <!-- .col-lg-10 -->
				</div>
				<!-- .form-group -->
				<div class="form-group">
				  <?php echo $this->Form->label('status', 'Status', array('class' => 'col-lg-2 control-label'));?>
				  <div class="col-lg-10">
					<?php echo $this->Form->input('status', array('options' => array('1' => 'Published', '2' => 'Draft'))); ?>
				  </div>
				  <!-- .col-lg-10 -->
				</div>				
				<!-- .form-group -->
				<?php echo $this->Form->hidden('body', array('id' => 'kanjime_body')); ?>
				<?php echo $this->Form->hidden('id'); ?>					
				<!-- .form-group -->
			  
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
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<div id="kanjime_placeholder" class="">
			</div>
		</div>			
		<!-- side right column -->
		<div class="col-md-6">
			<div id="kanjime_preview" style="display:none;" class="well">
				<div class="kanjime_preview_body">
				</div>
			</div>				
		</div>		
	<div>

