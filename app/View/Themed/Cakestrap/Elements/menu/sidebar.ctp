<?php
	if(!$user) return;
?>
	<!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
			<?php echo $this->Html->getLinksToControllers($cur_controller, $cur_action) ?>
        </ul>
    </div>
    <!-- end sidebar -->