<?php
	$this->append('custom_css');
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/tables.css" type="text/css" media="screen" />';
	$this->end();
	$first_class = 'first';
	
	$status_list = $this->Collection->getStatusDescriptor();
	
?>
	
	<div class="table-wrapper users-table section">
		<div class="row-fluid head">
			<div class="span12">
				<h3><?php echo __('Names'); ?></h3>
			</div>
		</div>
		<div class="row-fluid filter-block">
			
				<div class="span3 pull-right">
				<?php echo $this->Html->link('New Name', array('controller' => 'collections', 'action' => 'add'), array('class'=>'btn-flat pull-right success new-product add-user')); ?>
				</div>
				<div class="span9">
					<?php echo $this->Form->create(null, array('controller'=>'collections','action'=>'search','type'=>'get', 'class' => 'span9 search-form pull-right', 'id'=>'UserSearchForm','inputDefaults' => array('label' => false, 'div' => false))); ?>
					<div class="input-append">
						<?php echo $this->Form->input('query', array('value'=> $query,'class'=>'span12' , 'placeholder'=>'Search for names..')); ?>
						<?php echo $this->Form->button('Search', array('id'=>'UserSearchSubmit','type' => 'submit', 'class'=>'btn')); ?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			
		</div>

		<div class="row-fluid">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="span2 sortable"><?php echo $this->Paginator->sort('title', __('Name')); ?></th>
						<th class="span2 sortable hid"><span class="line"></span><?php echo $this->Paginator->sort('subtitle', __('Kanji')); ?></th>
						<th class="span2 sortable hid"><span class="line"></span><?php echo $this->Paginator->sort('description', __('Katakana')); ?></th>
						<th class="span2 sortable hid"><span class="line"></span><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
						<th class="span2 sortable hid"><span class="line"></span><?php echo $this->Paginator->sort('created', __('Status')); ?></th>
						<th class="span2"><span class="line"></span></th>
					</tr>	
				</thead>
				<tbody>
				<?php foreach ($collections as $collection): ?>
					
					<tr class="<?php echo $first_class; ?>">
						<td>
							<?php echo $this->Html->link($collection['Collection']['title'], array('action' => 'view', $collection['Collection']['id']), array('class' => 'title')); ?>
						</td>
						<td class="hid"><span class="subtitle"><?php echo h($collection['Collection']['subtitle']); ?></span></td>
						<td class="hid"><span class="subtitle"><?php echo h($collection['Collection']['description']); ?></span></td>
						<td class="hid"><?php echo $this->Time->format(DATETIME_FORMAT, $collection['Collection']['created']); ?></td>
						<td class="hid"><span class="subtitle"><?php echo $status_list[$collection['Collection']['status']]; ?></span></td>
						<td class="align-right">
							<div class="btn-group">
								<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $collection['Collection']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
								<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $collection['Collection']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete %s?', $collection['Collection']['title'])); ?>
							</div>
						</td>
					</tr>
					<?php $first_class = ''; ?>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		
		<p><small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>
		<div class="pagination inverse pull-right">
			<ul>
				<?php
				echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
				echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul>
		</div>		
	</div>
