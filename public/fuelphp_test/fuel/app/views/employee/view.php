<h2>社員詳細 <span class='muted'>#<?php echo $employee->id; ?></span></h2>

<p>
	<strong>氏名:</strong>
	<?php echo $employee->full_name; ?></p>
<p>
	<strong>氏名(カタカナ):</strong>
	<?php echo $employee->name_kana; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $employee->email; ?></p>
<p>
	<strong>所属:</strong>
	<?php echo $employee->affiliation; ?></p>
<p>
	<strong>在職区分:</strong>
	<?php echo $employee->tenure_flag; ?></p>
<p>
	<strong>備考:</strong>
	<?php echo $employee->user_remarks; ?></p>
<p>
	<strong>入社日:</strong>
	<?php echo $employee->hire_date; ?></p>
<!-- <p>
	<strong>Is deleted:</strong>
	is deleted の表記
</p> -->


<?php echo Html::anchor('employee/edit/'.$employee->id, '編集'); ?> |
<?php echo Html::anchor('employee', '戻る'); ?>