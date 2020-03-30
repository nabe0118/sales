<h2>クライアント詳細<span class='muted'></span></h2>

<p>
	<strong>No.</strong>
	<?php echo $client->id; ?>
</p>

<p>
	<strong>クライアント名:</strong>
	<?php echo $client->client_name; ?>
</p>
<p>
	<strong>フリガナ:</strong>
	<?php echo $client->client_kana; ?>
</p>
<p>
	<strong>備考:</strong>
	<?php echo $client->client_remarks; ?>
</p>
<p>
	<!-- <strong>Is deleted:</strong> -->
	<?php /*echo $client->is_deleted; */?>
</p>

<?php echo Html::anchor('clients/edit/'.$client->id, '編集'); ?> |
<?php echo Html::anchor('clients', '戻る'); ?>