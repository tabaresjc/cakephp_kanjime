<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
	$this->append('custom_script');
		echo $this->Html->script('libs/kanjime');
	$this->end();
?>
	<div class="row header">		
		<h3>Details for <?php echo $collection['Collection']['title']; ?></h3>
	</div>
	<div class="row">
		<!-- left column -->
		<div class="col-md-9">
			
			<div class="panel panel-primary">
			  <div class="panel-heading">Details</div>
			  <table class="table table-striped table-condensed">
					<tr>
					  <td>
						<strong>
						  <?php echo __('Id'); ?>
						</strong>
					  </td>
					  <td><?php echo h($collection['Collection']['id']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Name'); ?>
						</strong>
					  </td>
					  <td><?php echo h($collection['Collection']['title']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Kanji'); ?>
						</strong>
					  </td>
					  <td><?php echo h($collection['Collection']['subtitle']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Katakana'); ?>
						</strong>
					  </td>
					  <td><?php echo h($collection['Collection']['description']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Created'); ?>
						</strong>
					  </td>
					  <td><?php echo $this->Time->format('F jS, Y H:i', $collection['Collection']['created']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Modified'); ?>
						</strong>
					  </td>
					  <td><?php echo $this->Time->format('F jS, Y H:i', $collection['Collection']['modified']); ?></td>
					</tr>
				
			  </table>
			  <?php echo $this->Form->hidden('Collection.body', array('id' => 'kanjime_body', 'value'=> $collection['Collection']['body'])); ?>
			  <!-- .table table-striped table-bordered -->
			</div>
			<div id="kanjime_viewer"></div>
		</div>			
		<!-- side right column -->
		<div class="col-md-3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo $this->Html->link(__('List Names'), array('action' => 'index')); ?>
							</div>						
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo $this->Html->link(__('Edit Name'), array('action' => 'edit', $collection['Collection']['id'])); ?>
							</div>
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo $this->Form->postLink(__('Delete Name'), array('action' => 'delete', $collection['Collection']['id']), null, __('Are you sure you want to delete %s?', $collection['Collection']['title'])); ?>
							</div>
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo $this->Html->link(__('New Name'), array('action' => 'add')); ?>
							</div>							
						</div>
					</div>
				</div>
			</div>				
		</div>		
	<div>
	



