<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
	<div class="row header">
		<div class="col-md-12">
			<h3><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="<?php echo $pluralVar; ?> index">
				<table class="table table-bordered table-condensed">
					<thead><?php  
						foreach ($fields as $field){
							echo "\n\t\t\t\t\t\t<th><?php echo \$this->Paginator->sort('{$field}'); ?></th>";
						}
						echo "\n\t\t\t\t\t\t<th><th class=\"actions\"><?php echo __('Actions'); ?></th>\n";
						?>
					</thead>
					<tbody><?php
						echo "\n\t\t\t\t\t\t<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
						echo "\t\t\t\t\t\t<tr>\n";
						foreach ($fields as $field) {
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "\t\t\t\t\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
										break;
									}
								}
							}
							if ($isKey !== true) {
								echo "\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
							}
						}
						echo "\t\t\t\t\t\t\t<td>\n";
						echo "\t\t\t\t\t\t\t\t<div class=\"btn-group\">\n";
						echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn')); ?>\n";
						echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-primary')); ?>\n";
						echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
						echo "\t\t\t\t\t\t\t\t</div>\n";
						echo "\t\t\t\t\t\t\t</td>\n";						
						echo "\t\t\t\t\t\t</tr>\n";
						echo "\t\t\t\t\t\t<?php endforeach; ?>";
						?>					
						</tbody>
				</table>
				<div>
					<?php echo "<p><small><?php echo \$this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>\n"; ?>					
					<ul class="pagination inverse pull-right"><?php
							echo "\n\t\t\t\t\t\t<?php\n";
							echo "\t\t\t\t\t\techo \$this->Paginator->prev('&#8249;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));\n";
							echo "\t\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
							echo "\t\t\t\t\t\techo \$this->Paginator->next('&#8250;', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'escape'=>false));\n";
							echo "\t\t\t\t\t\t?>\n";
						?>
					</ul>
				</div><!-- .pagination -->
			</div><!-- .index -->
		</div><!-- .col-md-12 -->	
	</div>

