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
				<h6><?php echo __('Log in'); ?></h6>
				<?php 
				echo $this->Form->input('username', array( 'label' => false, 'class' => 'span12', 'placeholder' => 'Your Username' ));
				echo $this->Form->input('password', array( 'label' => false, 'class' => 'span12', 'placeholder' => 'Your Password' ));
				echo "\t" . '<a href="#" class="forgot">Forgot password?</a>' . "\n";
				echo "\t" . '<div class="remember">' . "\n";
				echo "\t" . '	<input id="remember-me" type="checkbox">' . "\n";
				echo "\t" . '	<label for="remember-me">Remember me</label>' . "\n";
				echo "\t" . '</div>' . "\n";
				echo $this->Form->button('Log in', array('type' => 'submit', 'class' => 'btn-glow primary login'));
				?>
			</div>
		<?php echo $this->Form->end(); ?>		
		</div>
		<div class="span4 no-account">
			<p>Don't have an account?</p>
			<a href="signup.html">Sign up</a>
		</div>
	</div>	



