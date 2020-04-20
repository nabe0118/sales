<h2><span class='muted'>プロジェクト変更</span></h2>
<br>

<?php echo View::render('projects/_form',$client_data); ?>
<p>
	<?php // echo Html::anchor('projects/view/'.$project->id, 'View'); ?> 
	<?php echo Html::anchor('projects', '戻る'); ?></p>
