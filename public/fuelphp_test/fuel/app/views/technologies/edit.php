<h2><span class='muted'>技術編集</span></h2>
<br>

<?php echo render('technologies/_form'); ?>
<p>
	<?php echo Html::anchor('technologies/view/'.$technology->id, '詳細'); ?> |
	<?php echo Html::anchor('technologies', '戻る'); ?></p>
