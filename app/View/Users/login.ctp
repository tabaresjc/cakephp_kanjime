<?php
	$this->append('custom_css');
	echo "\t". '<!-- this page specific styles -->' . "\n";
	echo "\t". '<link rel="stylesheet" href="/admin/css/compiled/signin.css" type="text/css" media="screen" />';
	$this->end();
?>
	<div class="row-fluid login-wrapper">
		<!--
		<a href="index.html">
			<img class="logo" src="/img/logo.png">
		</a>
		-->
		<div class="box">
		<?php echo $this->Form->create('User', array('class' => 'content-wrap')); ?>
			<div class="content-wrap">
				<h6><?php echo __('Sign in'); ?></h6>
				<?php 
				echo $this->Form->input('username', array( 'label' => false, 'class' => 'span12', 'placeholder' => 'Your Username' ));
				echo $this->Form->input('password', array( 'label' => false, 'class' => 'span12', 'placeholder' => 'Your Password' ));
				?>
				<div class="remember">
					<?php /*echo $this->Form->checkbox('remember_me');*/ ?>
					<?php /*echo $this->Form->label('remember_me', 'Remember me');*/ ?>
				</div>
				<?php echo $this->Form->button('Log in', array('type' => 'submit', 'class' => 'btn-glow primary login')); ?>
			</div>
		<?php echo $this->Form->end(); ?>		
		
		</div>
		<!--
		<div class="span4 no-account">
			<p>Don't have an account?</p>
			<a href="signup.html">Sign up</a>
		</div>
		-->
	</div>	



