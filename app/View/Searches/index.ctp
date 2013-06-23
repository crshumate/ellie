<div class="span12">
	<? if(!empty($list)) :?>
		<ul>
		<?php foreach($list as $post) :?>
			
			      <li class="well well-large">
			<h1><? echo $post['Post']['title']?></h1>
				<div><? echo $post['Post']['description']?></div>
				<p><?= $this->Html->link('Read More', array('controller'=>'posts', 'action'=>'view', $post['Post']['slug']))?></p>
				</li>
	
	
		<?php endforeach; ?>
	</ul>

	<div class='pagination pagination-centered'>
		<ul>
	<?
if(count($list) > $paginateMin){
	
	echo $this->Paginator->prev('<<', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'prev disabled'));

	echo $this->Paginator->numbers(array(
		'tag'=>'li', 
		'currentTag'=>'a',
		'separator'=>false));

	echo $this->Paginator->next('>>', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'next disabled'));
}
	?>

		</ul>
	</div>
	<?php else: ?>
		<h2>No matches found</h2>
		<p>No matching articles found. Please try a different search.</p>
	
	<? endif; ?>

</div>