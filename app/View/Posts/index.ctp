<div class="posts span12">
	<div class="row-fluid">
		<ul>
		  <?php foreach($posts as $post) :?>
		      <li class="well well-large span6">
		<h1><? echo $post['Post']['title']?></h1>
			<div><? echo $post['Post']['description']?></div>
			<p><?= $this->Html->link('Read More', array('controller'=>'posts', 'action'=>'view', $post['Post']['slug']))?></p>
			</li>

		<?php endforeach;?>
		</ul>
	</div>

<?
	if(count($posts) > $paginateMin){
echo "<div class='pagination pagination-centered'><ul>";

echo $this->Paginator->prev('<<', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'prev disabled'));

echo $this->Paginator->numbers(array(
	'tag'=>'li', 
	'currentTag'=>'a',
	'separator'=>false));

echo $this->Paginator->next('>>', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'next disabled'));

echo "</ul></div>";
}
?>
</div>