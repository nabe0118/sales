<h2><span class='muted'>プロジェクト編集</span></h2>
<br>

<?php echo render('projects/_form'); ?>
<p>
	<?php echo Html::anchor('projects/view/'.$project->id, '一覧'); ?> |
	<?php echo Html::anchor('projects', '戻る'); ?></p>
