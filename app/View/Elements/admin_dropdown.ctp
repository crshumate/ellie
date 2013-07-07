			<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						    <i class="icon-white icon-list"></i>
							Admin Links
						    <span class="caret"></span>
						  </a>
					  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						 <li><?= $this->Html->link('Categories', array('controller'=>'categories', 'action'=>'index', 'admin'=>true))?></li>
						 <li><?= $this->Html->link('Posts', array('controller'=>'posts', 'action'=>'index', 'admin'=>true))?></li>
						<li><?= $this->Html->link('Pages', array('controller'=>'pages', 'action'=>'index', 'admin'=>true))?></li>
						 <li class="divider"></li>
						
						<li><?= $this->Html->link('Add Category', array('controller'=>'categories', 'action'=>'add', 'admin'=>true))?></li>
					    <li><?= $this->Html->link('Add Post', array('controller'=>'posts', 'action'=>'add', 'admin'=>true));?></li>
					<li><?= $this->Html->link('Add Page', array('controller'=>'pages', 'action'=>'add', 'admin'=>true));?></li>
					    
				<li class="divider"></li>	
				<li><?= $this->Html->link('Site Settings', array('controller'=>'sites', 'action'=>'settings','admin'=>true));?></li> 
				<li><?= $this->Html->link('Account Settings', array('controller'=>'users', 'action'=>'settings','admin'=>true));?></li>    
					   
				<li><?= $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false));?></li>   
					   
					  </ul></li>

