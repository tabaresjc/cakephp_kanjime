
    <div id="page-container" class="row-fluid">
      <div id="sidebar" class="span3">
        <div class="actions">
          <ul class="nav nav-list bs-docs-sidenav">
            <li>
              <?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?>
            </li>
          </ul>
          <!-- .nav nav-list bs-docs-sidenav -->
        </div>
        <!-- .actions -->
      </div>
      <!-- #sidebar .span3 -->
      <div id="page-content" class="span9">
        <div class="users index">
          <h2>
            <?php echo __('Users'); ?>
          </h2>
          <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
            <tr>
              <th class="hid">
                <?php echo $this->Paginator->sort('id', 'Id'); ?>
              </th>
              <th class="hid">
                <?php echo $this->Paginator->sort('name', 'Name'); ?>
              </th>			  
              <th>
                <?php echo $this->Paginator->sort('username', 'login'); ?>
              </th>
              <th class="hid">
                <?php echo $this->Paginator->sort('role', 'Role'); ?>
              </th>
              <th class="hid">
                <?php echo $this->Paginator->sort('created'); ?>
              </th>
              <th class="actions">
                <?php echo __('Actions'); ?>
              </th>
            </tr>
			<?php foreach ($users as $user): ?>
            <tr>
              <td class="hid">
                <?php echo h($user['User']['id']); ?>
              </td>
              <td class="hid">
                <?php echo h($user['User']['name']); ?>
              </td>			  
              <td>
                <?php echo h($user['User']['username']); ?>
              </td>
              <td class="hid">
                <?php echo h($user['User']['role']); ?>
              </td>
              <td class="hid">
                <?php echo $this->Time->format('F jS, Y H:i', $user['User']['created']); ?>
              </td>
              <td class="actions">
				<div class="btn-group">
				  <a class="btn btn-primary" href="javascript:void(0);"><i class="icon-user icon-white"></i> User</a>
				  <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('icon' => 'icon-search')); ?></li>
					<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('icon' => 'icon-pencil')); ?></li>
					<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('icon' => 'icon-trash'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></li>
				  </ul>
				</div>
              </td>
            </tr><?php endforeach; ?>
          </table>

          <div class="pagination">
            <ul>
				<?php
				echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
				echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
            </ul>
          </div>
          <!-- .pagination -->
        </div>
        <!-- .index -->
      </div>
      <!-- #page-content .span9 -->
    </div>
    <!-- #page-container .row-fluid -->
