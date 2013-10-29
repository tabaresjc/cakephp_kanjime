<?php
	$this->append('custom_css');
		echo "\t". '<!-- this page specific styles -->' . "\n";
		echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/ui-elements.css" type="text/css" media="screen" />';
	$this->end();	
?>

	<div class="row header">		
		<h3><?php  echo __('Details for this Device'); ?></h3>
	</div>

    <div class="row-fluid">
      <div class="col-md-9">
        <div class="devices view">
			<div class="panel panel-primary">
				<div class="panel-heading"><?php echo __('Details'); ?></div>		
				<table class="table table-striped table-condensed">
					<tr>
					  <td>
						<strong>
						  <?php echo __('Id'); ?>
						</strong>
					  </td>
					  <td><?php echo h($device['Device']['id']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Device Token'); ?>
						</strong>
					  </td>
					  <td><?php echo h($device['Device']['device_token']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Enabled'); ?>
						</strong>
					  </td>
					  <td><?php echo $this->Html->booleanLabel($device['Device']['enabled']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Created'); ?>
						</strong>
					  </td>
					  <td><?php echo h($device['Device']['created']); ?></td>
					</tr>
					<tr>
					  <td>
						<strong>
						  <?php echo __('Modified'); ?>
						</strong>
					  </td>
					  <td><?php echo h($device['Device']['modified']); ?></td>
					</tr>
				</table>
				<!-- .table table-striped table-bordered -->
			 </div>			
        </div>
        <!-- .view -->
      </div>
      <!-- #page-content .span9 -->
      <div class="col-md-3">
        <div class="pop-dialog full">
          <div class="body">
            <div class="settings">
              <div class="items">
                <div class="item">
                  <?php echo $this->Html->link(__('List Devices'), array('action' => 'index'), array('class' => '')); ?>
                </div>
                <div class="item">
                  <?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id']), array('class' => '')); ?>
                </div>
                <div class="item">
                  <?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?>
                </div>
                <div class="item">
                  <?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #sidebar .span3 -->
    </div>
    <!-- #page-container .row-fluid -->


