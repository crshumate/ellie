<div class="span3 visible-desktop visible-tablet">
	
		<? if(!empty($post['Post']['sources'])){
				echo $this->Site->createSourceList($post['Post']['sources']);
			
			}
	
		
		echo $this->Site->links();?>
</div>
<div class="posts view span9">
	<h1><?php echo h($post['Post']['title']); ?></h1>
	
	<? echo $post['Post']['content'];?>
	
	<div class="visible-phone">
	<?
	if(!empty($post['Post']['sources'])){
			echo $this->Site->createSourceList($post['Post']['sources']);
		}
	?>
	</div>
</div>