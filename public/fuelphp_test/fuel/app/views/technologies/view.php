<h2>使用技術一覧 <span class='muted'>#<?php echo $technology->id; ?></span></h2>

<p>
	<strong>技術名:</strong>
	<?php echo $technology->technology_name; ?></p>
<p>
	<!-- <strong>Is deleted:</strong> -->
	<?php /* echo $technology->is_deleted; */ ?></p>

<?php echo Html::anchor('technologies/edit/'.$technology->id, '編集'); ?> |
<?php echo Html::anchor('technologies', '戻る'); ?>