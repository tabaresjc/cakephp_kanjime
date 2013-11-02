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
<?php echo "<?php\n"; ?>
<?php echo "	\$this->append('custom_css');\n"; ?>
<?php echo "	echo \"\\n\";\n"; ?>
<?php echo "	echo '    <!-- this page specific styles -->' . \"\\n\";\n"; ?>
<?php echo "	echo '    <link rel=\"stylesheet\" href=\"/admin/css/compiled/ui-elements.css\" type=\"text/css\" media=\"screen\" />';\n"; ?>
<?php echo "	\$this->end();	\n"; ?>
<?php echo "?>\n"; ?>
	<div class="row header">		
		<h3><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></h3>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="<?php echo $pluralVar; ?> view">
				<div class="panel panel-primary">
					<div class="panel-heading">Details</div>
					<table class="table table-striped table-condensed">
						<?php
						foreach ($fields as $field) {
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "\n\t\t\t\t\t\t<tr>";
										echo "\n\t\t\t\t\t\t\t<td><strong><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></strong></td>";
										echo "\n\t\t\t\t\t\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?></td>";
										echo "\n\t\t\t\t\t\t</tr>";
										break;
									}
								}
							}
							if ($isKey !== true) {
								echo "\n\t\t\t\t\t\t<tr>";
								echo "\n\t\t\t\t\t\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>";
								echo "\n\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>";
								echo "\n\t\t\t\t\t\t</tr>";
							}
						}
						?>					
					</table><!-- .table table-striped table-bordered -->
				</div><!-- .panel-primary -->
			</div><!-- .view -->
			<?php
			if (!empty($associations['hasOne'])) :
				foreach ($associations['hasOne'] as $alias => $details): ?>
					<div class="related">
						<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
						<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
							<table class="table table-striped table-bordered">
								<?php
								foreach ($details['fields'] as $field) {
									echo "<tr>";
									echo "\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
									echo "\t\t<td><strong><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</strong></td>\n";
									echo "</tr>";
								}
								?>
							</table><!-- .table table-striped table-bordered -->
						<?php echo "<?php endif; ?>\n"; ?>
						<div class="actions">
							<?php echo "<li><?php echo \$this->Html->link(__('<i class=\"icon-pencil icon-white\"></i> Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n"; ?>
						</div><!-- .actions -->
					</div><!-- .related -->
				<?php
				endforeach;
			endif;

			if (empty($associations['hasMany'])) {
				$associations['hasMany'] = array();
			}
			if (empty($associations['hasAndBelongsToMany'])) {
				$associations['hasAndBelongsToMany'] = array();
			}
			$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
			$i = 0;
			foreach ($relations as $alias => $details):
				$otherSingularVar = Inflector::variable($alias);
				$otherPluralHumanName = Inflector::humanize($details['controller']);
				?>
				
				<div class="related">

					<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
					
					<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
					
						<table class="table table-striped table-bordered">
							<tr>
								<?php
									foreach ($details['fields'] as $field) {
										echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
									}
								?>
								<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
							</tr>
							<?php
							echo "\t<?php
									\$i = 0;
									foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
									echo "\t\t<tr>\n";
										foreach ($details['fields'] as $field) {
											echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
										}

										echo "\t\t\t<td class=\"actions\">\n";
										echo "\t\t\t\t<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n";
										echo "\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n";
										echo "\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
										echo "\t\t\t</td>\n";
									echo "\t\t</tr>\n";

							echo "\t<?php endforeach; ?>\n";
							?>
						</table><!-- .table table-striped table-bordered -->
						
					<?php echo "<?php endif; ?>\n\n"; ?>
					
					<div class="actions">
						<?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus icon-white\"></i> '.__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>"; ?>
					</div><!-- .actions -->
					
				</div><!-- .related -->

			<?php endforeach; ?>			
		</div>
		<div class="col-md-3">
			<div class="pop-dialog full">
				<div class="body">                        
					<div class="settings">
						<div class="items">
							<div class="item">
								<i class="icon-reorder"></i>
								<?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>\n"; ?>								
							</div>						
							<div class="item">
								<i class="icon-edit icon-formatted"></i>
								<?php echo "<?php echo \$this->Html->link(__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => '')); ?>\n"; ?>
							</div>							
							<div class="item">
								<i class="icon-trash icon-formatted"></i>
								<?php echo "<?php echo \$this->Form->postLink(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => ''), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n"; ?>
							</div>
							<div class="item">
								<i class="icon-plus icon-formatted"></i>
								<?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>\n"; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$done = array();
			foreach ($associations as $type => $data) {
					foreach ($data as $alias => $details) {
							if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
									echo "		<div class=\"pop-dialog full\">\n";
									echo "			<div class=\"body\">\n";
									echo "				<div class=\"settings\">\n";
									echo "					<div class=\"items\">\n";
									echo "						<div class=\"item\">\n";
									echo "							<i class=\"icon-reorder\"></i>\n";
									echo "							<?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => '')); ?>\n";
									echo "						</div>\n";
									echo "						<?php if (strpos($action, 'add') === false): ?>\n";
									echo "						<div class=\"item\">\n";
									echo "							<i class=\"icon-plus icon-formatted\"></i>\n";
									echo "							<?php echo \$this->Html->link(__('New " .  Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => '')); ?>\n";
									echo "						</div>\n";
									echo "						<?php endif; ?>\n";
									echo "					</div>\n";
									echo "				</div>\n";
									echo "			</div>\n";
									echo "		</div>\n";
									$done[] = $details['controller'];
							}
					}
			} ?>

		</div>
	</div>
