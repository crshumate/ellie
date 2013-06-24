<?
$pages = $this->requestAction('commons/pages'); 
$categories = $this->requestAction('commons/categories');
?>

<? if(count($categories>0)) :?>
	<li><?= $this->Html->link('Categories', array('controller'=>'categories', 'action'=>'index', 'admin'=>false))?></li>
<?php endif;?>

<?php if(count($pages)>0) :?>
	<?php foreach($pages as $page) :?>
		<li><?= $this->Html->link($page['Page']['title'], array('controller'=>'pages', 'action'=>'view', $page['Page']['slug'], 'admin'=>false))?></li>
	<?php endforeach;?>

	<?php endif; ?>
					