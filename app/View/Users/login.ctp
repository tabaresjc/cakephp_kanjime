<?php
	$this->append('custom_css');
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/signin.css" type="text/css" media="screen" />';
	$this->end();
?>
	<div class="login-wrapper">

		<div class="box">
			<div class="content-wrap">
				<?php echo $this->Form->create('User', array('class' => '')); ?>
					<div class="content-wrap">
						<h6><?php echo __('Sign in'); ?></h6>
						<?php 
						echo $this->Form->input('username', array( 'label' => false,'div' => false, 'class' => 'form-control', 'placeholder' => 'Your Username' ));
						echo $this->Form->input('password', array( 'label' => false,'div' => false, 'class' => 'form-control', 'placeholder' => 'Your Password' ));
						?>

						<?php echo $this->Form->button('Log in', array('type' => 'submit', 'class' => 'btn-glow primary login')); ?>
						
					</div>
				<?php echo $this->Form->end(); ?>		
			</div>
		</div>

	</div>	



