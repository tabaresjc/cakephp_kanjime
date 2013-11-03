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
<div class="row">
	<div class="col-md-9">
		<div class="<?php echo $pluralVar; ?> form">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h3></div>			
				<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>\n"; ?>
					<div class="panel-body"><?php
						foreach ($fields as $field) {
							if (strpos($action, 'add') !== false && $field == $primaryKey) {
								continue;
							} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
								echo "\n\t\t\t\t\t\t<div class=\"form-group\">\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Form->label('{$field}', '". Inflector::humanize(Inflector::underscore($field)) ."', array('class' => 'col-lg-2 control-label'));?>\n";
								echo "\t\t\t\t\t\t\t<div class=\"col-lg-10\">\n";
								echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control')); ?>\n";
								echo "\t\t\t\t\t\t\t</div><!-- .col-lg-10 -->\n";
								echo "\t\t\t\t\t\t</div><!-- .form-group -->\n";
								
							}
						}
						if (!empty($associations['hasAndBelongsToMany'])) {
							foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
								echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}');?>\n";
							}
						}
						?>
					</div>
					<div class="panel-footer">
						<?php echo "<?php echo \$this->Form->button('Clear', array('type' => 'reset', 'class' => 'btn btn-large btn-danger')); ?>\n"; ?>
						<?php echo "<?php echo \$this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-large btn-primary pull-right')); ?>"; ?>					
					</div>
				<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
			</div>
		</div>
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
						<?php if (strpos($action, 'add') === false): ?>
						<div class="item">
							<i class="icon-trash icon-formatted"></i>
							<?php echo "<?php echo \$this->Form->postLink(__('Remove " . $singularHumanName . "'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>\n"; ?>
						</div>
						<div class="item">
							<i class="icon-plus icon-formatted"></i>
							<?php echo "<?php echo \$this->Html->link(__('Add " . $singularHumanName . "'), array('action' => 'add')); ?>\n"; ?>
						</div>						
						<?php endif; ?>						
					</div>
				</div>
			</div>
		</div>

		<?php
			$done = array();
			foreach ($associations as $type => $data) {
					foreach ($data as $alias => $details) {
							if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
									echo "\n		<hr/>\n";
									echo "		<div class=\"pop-dialog full\">\n";
									echo "			<div class=\"body\">\n";
									echo "				<div class=\"settings\">\n";
									echo "					<div class=\"items\">\n";
									echo "						<div class=\"item\">\n";
									echo "							<i class=\"icon-reorder\"></i>\n";
									echo "							<?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?>\n";
									echo "						</div>\n";
									
									echo "						<div class=\"item\">\n";
									echo "							<i class=\"icon-plus icon-formatted\"></i>\n";
									echo "							<?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?>\n";
									echo "						</div>\n";
									
									echo "					</div>\n";
									echo "				</div>\n";
									echo "			</div>\n";
									echo "		</div>\n";
									$done[] = $details['controller'];
							}
					}
			}
		?>

	</div>
</div>

