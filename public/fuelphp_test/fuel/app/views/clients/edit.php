<h2><span class='muted'>クライアント詳細</span></h2>
<br>

<?php echo render('clients/_form'); ?>
<p>
	<?php echo Html::anchor('clients/view/'.$client->id, '一覧'); ?> |
	<?php echo Html::anchor('clients', '戻る'); ?></p>
