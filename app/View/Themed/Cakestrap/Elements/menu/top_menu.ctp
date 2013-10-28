<?php

?>
    <!-- navbar -->
	<header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('<i class="icon-cloud"></i> <span style="text-transform: none;">Admin</span>', array('controller' => 'pages', 'action' => 'display', 'dashboard'), array('class' => 'navbar-brand', 'escape' => false)); ?>
        </div>
		<?php if(!empty($user)) { ?>
		<ul class="nav navbar-nav pull-right hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    <?php echo $user['name']; ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'view', $user['id'])); ?></li>
					<li><?php echo $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Kanji', array('controller' => 'collections', 'action' => 'index')); ?></li>
                    <li class="divider"></li>
					<li>
						<?php 
							echo $this->Form->create('User', array('action' => 'logout' , 'class' => '', 'inputDefaults' => array('label' => false,'div' => false)));
							echo $this->Form->end(); 
						?>					
						<a href="javascript:void(0);" onclick="document.getElementById('UserLogoutForm').submit();">Logout</a>
					</li>
                </ul>
            </li>		
		</ul>
		<?php } ?>

	</header>
	<!-- end navbar -->