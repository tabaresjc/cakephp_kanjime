<?php 
	if($this->params['controller']!='users' && $this->params['action']!='login'){
		echo $this->Html->getCrumbList(array( 'class' => 'breadcrumb', 'separator' => '<span class="divider">/</span>' ), 'Admin');
	}
?>
