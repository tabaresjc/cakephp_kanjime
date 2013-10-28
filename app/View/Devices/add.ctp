<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>
<div class="row-fluid header">	
	<h2><?php echo __('Add Device'); ?></h2>
</div>
<div class="row-fluid">	
	<div class="span9">
		<?php echo $this->Form->create('Device', array('inputDefaults' => array('label' => false), 'class' => 'form-horizontal')); ?>
			
			<div class="control-group">
				<?php echo $this->Form->label('device_token', 'Device Token', array('class' => 'control-label'));?>
				<div class="controls">
				<?php echo $this->Form->input('device_token', array('class' => 'span12')); ?>
				</div><!-- .controls -->
			</div><!-- .control-group -->
			<div class="control-group">
			  <?php echo $this->Form->label('enabled', 'Enabled', array('class' => 'control-label'));?>
			  <div class="controls">
				<?php echo $this->Form->input('enabled', array('options' => array('1' => 'Yes', '0' => 'No'),'value'=>'1')); ?>
			  </div>
			  <!-- .controls -->
			</div>			
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
	</div><!-- #page-content .span9 -->
	<div class="span3">	
		<div class="pop-dialog full">
			<div class="body">                        
				<div class="settings">
					<div class="items">
						<div class="item">
							<i class="icon-reorder"></i>
							<?php echo $this->Html->link(__('List Devices'), array('action' => 'index' )); ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div><!-- #sidebar .span3 -->
</div><!-- #page-container .row-fluid -->
