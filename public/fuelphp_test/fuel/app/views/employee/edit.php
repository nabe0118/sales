<h2><span class='muted'>社員情報更新</span></h2>
<br>

<?php echo render('employee/_form'); ?>
<p>
	<?php echo Html::anchor('employee/view/'.$employee->id, '一覧'); ?> |
	<?php echo Html::anchor('employee', '戻る'); ?></p>
