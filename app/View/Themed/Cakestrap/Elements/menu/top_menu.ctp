<?php
	if($cur_controller==='users' && ($cur_action==='login' || $cur_action==='signup')){
		return;
	}
?>
    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('', array('controller' => 'admin', 'action' => 'index'), array('class' => 'brand', 'inline-html' => '<img src="/admin/img/logo.png">')); ?>
			<?php if(!empty($user)) { ?>
            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
				<!--
				<li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">8</span>
                    </a>
					
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>You have 6 new notifications</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 13 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 18 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-envelope-alt"></i> New message from Alejandra
                                    <span class="time"><i class="icon-time"></i> 28 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 49 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> New order placed
                                    <span class="time"><i class="icon-time"></i> 1 day.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
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