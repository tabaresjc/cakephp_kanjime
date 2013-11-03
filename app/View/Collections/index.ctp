		<div class="row header">
			<div class="col-md-12">
				<h3><?php echo __('List of Kanjis & Names'); ?></h3>
			</div>
		</div>
		<div class="row" style="margin:0px auto 30px auto;">
			<div class="col-md-9">
				<?php echo $this->Form->create(null, array('controller'=>'collections','action'=>'search','type'=>'get', 'class' => 'form-inline col-md-12', 'role' => 'form', 'id'=>'UserSearchForm','inputDefaults' => array('label' => false, 'div' => false))); ?>
					<?php echo $this->Form->input('query', array('value'=> $query, 'class'=>'form-control' , 'div' => 'form-group', 'placeholder'=>'Search for names..')); ?>
					<?php echo $this->Form->submit('Search', array('class' => 'btn btn-primary','div' => false)); ?>
					<?php echo $this->Html->link('Clear', array('controller' => 'collections', 'action' => 'index'), array('class' => 'btn btn-default')); ?>					
				<?php echo $this->Form->end(); ?>				
			</div>
			<div class="col-md-3">
				<?php echo $this->Html->link('New Name', array('controller' => 'collections', 'action' => 'add'), array('class'=>'btn-flat pull-right success new-product add-user')); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th class="col-md-2 sortable"><?php echo $this->Paginator->sort('title', __('Name')); ?></th>
								<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('subtitle', __('Kanji')); ?></th>
								<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('description', __('Katakana')); ?></th>
								<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
								<th class="col-md-2 sortable visible-lg"><?php echo $this->Paginator->sort('created', __('Status')); ?></th>
								<th></th>
							</tr>	
						</thead>
						<tbody>
						
						<?php foreach ($collections as $collection): ?>				
							<tr>
								<td>
									<?php echo $this->Html->link($collection['Collection']['title'], array('action' => 'view', $collection['Collection']['id']), array('class' => 'title')); ?>
								</td>
								<td class="visible-lg"><span class="subtitle"><?php echo h($collection['Collection']['subtitle']); ?></span></td>
								<td class="visible-lg"><span class="subtitle"><?php echo h($collection['Collection']['description']); ?></span></td>
								<td class="visible-lg"><?php echo $this->Time->format(DATETIME_FORMAT, $collection['Collection']['created']); ?></td>
								<td class="visible-lg"><span class="<?php echo $this->Collection->getStatusDescriptorClass($collection['Collection']['status']); ?>"><?php echo $this->Collection->getStatusDescriptor($collection['Collection']['status']); ?></span></td>
								<td>
									<div class="btn-group">
										<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $collection['Collection']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
										<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $collection['Collection']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete %s?', $collection['Collection']['title'])); ?>
									</div>
								</td>
							</tr>							
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<p><small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>
				<ul class="pagination inverse pull-right">
					<?php
					echo $this->Paginator->prev('<', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
					echo $this->Paginator->next('>', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					?>
				</ul>
			</div>
		</div>
		
		
		<div>

		</div>

