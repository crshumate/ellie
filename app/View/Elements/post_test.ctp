<h2>Latest Posts</h2>
<?php $categories = $this->requestAction('commons/categories'); ?>
<ol>
<?php foreach ($categories as $category): ?>
      <li><?php echo $category['Category']['type']; ?></li>
<?php endforeach; ?>
</ol>