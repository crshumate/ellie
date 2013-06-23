<div class="span2 visible-desktop visible-tablet">
	<? echo $this->Site->links();?>
	
</div>
<div class="posts view span10 well">
	<h1><?php echo h($page['Page']['title']); ?></h1>
	
	<? echo $page['Page']['content'];?>

</div>