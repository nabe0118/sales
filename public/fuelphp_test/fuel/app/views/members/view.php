<h2>Viewing <span class='muted'>#<?php echo $member->id; ?></span></h2>

<p>
	<strong>社員番号:</strong>
	<?php echo $member->employee_id; ?>
</p>
<p>
	<strong>氏名:</strong>
	<?php echo $member->full_name; ?>
</p>
<p>
	<strong>カタカナ:</strong>
	<?php echo $member->name_kana; ?>
</p>
<p>
	<strong>Email:</strong>
	<?php echo $member->email; ?>
</p>
<p>
	<strong>Password:</strong>
	<?php echo $member->password; ?>
</p>
<p>
	<strong>権限:</strong>
	<?php echo $member->authority; ?>
</p>





<?php echo Html::anchor('members/edit/'.$member->id, '詳細'); ?> |
<?php echo Html::anchor('members', '戻る'); ?>