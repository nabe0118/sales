<h2>Viewing #<?php echo $post->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Title</dt>
	<dd><?php echo $post->title; ?></dd>
	<br>
	<dt>Slug</dt>
	<dd><?php echo $post->slug; ?></dd>
	<br>
	<dt>Summary</dt>
	<dd><?php echo $post->summary; ?></dd>
	<br>
	<dt>Body</dt>
	<dd><?php echo $post->body; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $post->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/posts', 'Back', array('class' => 'btn btn-default')); ?>
</div>
