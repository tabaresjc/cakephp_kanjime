<?php

?>
    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('<i class="icon-cloud"></i> <span style="text-transform: none;">Admin</span>', array('plugin'=>'','controller' => 'admins', 'action' => 'index'), array('class' => 'brand', 'escape' => false)); ?>
			<?php if(!empty($user)) { ?>
            <ul class="nav pull-right">                
                <!--
				<li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
				-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <?php echo $user['name']; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'edit', $user['id'])); ?></li>
                        <li><?php echo $this->Html->link(__('Add User'), array('controller' => 'users', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List User'), array('controller' => 'users', 'action' => 'index')); ?></li>
						<li class="divider"></li>
						<li class="settings hidden-phone">
							<a href="javascript:void(0);" onclick="document.getElementById('UserLogoutForm').submit();">Logout</a>
							<?php echo $this->Form->create('User', array('action' => 'logout' , 'class' => 'navbar-form pull-right', 'inputDefaults' => array('label' => false,'div' => false))); ?>
							<?php echo $this->Form->end(); ?>
						</li>
						
                    </ul>
                </li>
            </ul>
			<?php } ?>
        </div>
    </div>
	<!-- end navbar -->