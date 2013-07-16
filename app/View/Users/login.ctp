<?php
$this->append('css');
?>
<style type="text/css">
  .form-signin {
	max-width: 300px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	   -moz-border-radius: 5px;
			border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
	margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
  }
</style>
<?php
$this->end();
?>


<?php echo $this->Form->create('User', array('class' => 'form-signin')); ?>
    <h4><?php echo __('Please sign in'); ?></h4>
	<?php 
	echo $this->Form->input('username', array( 'label' => false, 'class' => 'input-block-level', 'placeholder' => 'Username' ));
    echo $this->Form->input('password', array( 'label' => false, 'class' => 'input-block-level', 'placeholder' => 'Password' ));
	echo '<label class="checkbox"> <input type="checkbox" value="remember-me"> Remember me </label>';
	echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'btn btn-large btn-primary')); 
	?>
<?php echo $this->Form->end(); ?>


