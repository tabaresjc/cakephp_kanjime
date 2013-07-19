
<div class="row-fluid">
  <ul class="thumbnails">
	<li class="span4">
	  <div class="thumbnail">
		<img data-src="holder.js/128x128" style="width: 128px; height: 128px;" src="/img/asian.png" />
		<div class="caption">
		  <h3 style="text-align:center">Names</h3>
		  <p>This module allows you to enter foreign names to be seen in the app, when you create a new name, make sure to enter the kanji and the katakana</p>
		  <p>
		  <?php echo $this->Html->link(__('Add Name'), array('controller' => 'collections', 'action' => 'add'),  array('class' => 'btn')); ?>
		  <?php echo $this->Html->link(__('List Names'), array('controller' => 'collections', 'action' => 'index'), array('class' => 'btn btn-primary pull-right')); ?>
		</div>
	  </div>
	</li>
	<li class="span4">
	  <div class="thumbnail">
		<img data-src="holder.js/128x128" style="width: 128px; height: 128px;" src="/img/users.png" />
		<div class="caption">
		  <h3  style="text-align:center">Users</h3>
		  <p>This module allows you to create, edit and delete the users that can access this website</p><br/>
		  <p>
		  <?php echo $this->Html->link(__('Add User'), array('controller' => 'users', 'action' => 'add'),  array('class' => 'btn')); ?>
		  <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary pull-right')); ?>
		</div>
	  </div>
	</li>

  </ul>
</div>

