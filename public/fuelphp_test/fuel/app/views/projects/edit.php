<h2><span class='muted'>プロジェクト変更</span></h2>
<br>

<?php echo render('projects/_form'); ?>
<p>
	<?php echo Html::anchor('projects/view/'.$project->id, 'View'); ?> |
	<?php echo Html::anchor('projects', 'Back'); ?></p>
