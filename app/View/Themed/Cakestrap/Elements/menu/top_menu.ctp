<?php
	$user = $this->Session->read('Auth.User');
	$menu_class = array();
	$menu_class[] = $this->params['controller']=='collections' ? 'active' : '';
	$menu_class[] = $this->params['controller']=='users' ? 'active' : '';
?>

			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<?php echo $this->Html->link('Kanji Me!', array('controller' => 'admins', 'action' => 'index'), array('class' => 'brand')); ?>
						<div class="nav-collapse">
							<ul class="nav">
								<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
								<?php if(!empty($user)) { ?>
								<li class="dropdown <?php echo $menu_class[0]; ?>">
									<?php echo $this->Html->link(__('Names'), '#', array( 'data-toggle' =>'dropdown', 'class' => 'dropdown-toggle', 'inline-html' => '<b class="caret"></b>')); ?>
									<ul class="dropdown-menu">
										<li><?php echo $this->Html->link(__('List Names'), array('controller' => 'collections', 'action' => 'index')); ?></li>
										<li><?php echo $this->Html->link(__('Add Name'), array('controller' => 'collections', 'action' => 'add')); ?></li>
									</ul>
								</li>
								<li class="dropdown <?php echo $menu_class[1]; ?>">
									<?php echo $this->Html->link(__('Users'), '#', array( 'data-toggle' =>'dropdown', 'class' => 'dropdown-toggle', 'inline-html' => '<b class="caret"></b>')); ?>
									<ul class="dropdown-menu">
										<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
										<li><?php echo $this->Html->link(__('Add User'), array('controller' => 'users', 'action' => 'add')); ?></li>
									</ul>
								</li>
								<?php } ?>
							</ul>
							<?php if(!empty($user)) { ?>
							<ul class="nav pull-right">
								<li><?php echo $this->Html->link('Hi '. $user['name'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?></li>
								<li>
									<?php
									echo $this->Form->create('User', array('action' => 'logout' , 'class' => 'navbar-form pull-right', 'inputDefaults' => array('label' => false,'div' => false)));
									echo $this->Form->button('Sign Out', array('type' => 'submit', 'class' => 'btn btn-success'));
									echo $this->Form->end();
									?>
								</li>
							</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			