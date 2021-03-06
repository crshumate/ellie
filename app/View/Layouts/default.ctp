<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min','bootstrap-responsive.min', 'base'));
		echo $this->Html->script(array('//code.jquery.com/jquery.js', 'bootstrap.min', 'base'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<header>

		<div class="navbar navbar-inverse navbar-fixed-top">
		  <div class="navbar-inner">
			
		
		  	<div class="container">
			    <? 
			 		if($this->params['controller']=='search') $action = "";
					else $action ="../search";
				
			
			echo $this->Form->create('Search', array('action'=>$action, 'type'=>'get', 'class'=>"navbar-search pull-right"));?>

				<?= $this->Form->input('search', 
					array(
					'type'=>'text', 
					'label'=>false, 
					'div'=>false,
					'class'=>'search-query',
					'placeholder'=>"Search"
					)
				)?>  	
			
			      	<?= $this->Form->input('Submit', 
						array(
							'type'=>'button', 
							'class'=>'btn btn-mini search-btn',
							'label'=>false,
							'div'=>false))?>
				
				  
			
				
			 <?= $this->Form->end();?>

		      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
		      <a class="btn btn-navbar pull-left" data-toggle="collapse" data-target=".nav-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </a>

		      <!-- Be sure to leave the brand out there if you want it shown -->
		      <?= $this->Html->link($this->element('site_name'), array('controller'=>'posts', 'action'=>'index'), array('class'=>'brand test'))?>

		      <!-- Everything you want hidden at 940px or less, place within here -->
		      <div class="nav-collapse collapse">
			    <ul class="nav">
					<li><?= $this->Html->link('Home', array('controller'=>'posts', 'action'=>'index', 'admin'=>false));
					?></li>
						
				<?echo $this->element('menu');?>
				<?php if($user['role_id']==1): ?>
					<?echo $this->element('admin_dropdown');?>
				
			 	<?php endif; ?>
				</ul>
		        <!-- .nav, .navbar-search, .navbar-form, etc -->
		      </div>

		    </div>
		  </div>
		</div>
	</header>
	<div class="container" id="container">
		<div class="row-fluid " id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	<div class="push"></div>
	</div>
		<div id="footer" class="container">
			<div style="row-fluid">
				<div class="span2">
					<ul class="nav">
						<li><?= $this->Html->link('Home', array('controller'=>'posts', 'action'=>'index', 'admin'=>false))?></li>
						
						<?echo $this->element('menu');?>
					</ul>
			</div>
			<div class="span9">	
				  <p class="disclaimer">
				  	<?php echo $this->element('footer_text')?>
				  </p>
				<p class="copyright"><?echo $this->element('site_name');?> &#0169 <? echo date('Y', time());?></p>
			</div>
			</div>
		
			
		</div>

</body>
</html>
