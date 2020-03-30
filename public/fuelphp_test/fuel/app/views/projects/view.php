<h2>プロジェクト詳細<span class='muted'>#<?php echo $project->id; ?></span></h2>

<p>
	<strong>プロジェクト名:</strong>
	<?php echo $project->project_name; ?></p>
<p>
	<strong>クライアントID:</strong>
	<?php echo $project->client_id; ?></p>
<p>
	<strong>使用技術ID:</strong>
	<?php echo $project->technology_id; ?></p>
<p>
	<strong>種別ID:</strong>
	<?php echo $project->development_id; ?></p>
<p>
	<strong>開始日:</strong>
	<?php echo $project->start_date; ?></p>
<p>
	<strong>納期:</strong>
	<?php echo $project->delivery_date; ?></p>
<p>
	<strong>金額:</strong>
	<?php echo $project->price; ?></p>
<p>
	<strong>金額区分:</strong>
	<?php echo $project->price_section; ?></p>
<p>
	<strong>注文:</strong>
	<?php echo $project->order_expectation; ?></p>
<p>
	<strong>ステータス:</strong>
	<?php echo $project->order_status; ?></p>
<p>
	<strong>PM:</strong>
	<?php echo $project->project_manager; ?></p>
<p>
	<strong>社員ID:</strong>
	<?php echo $project->employee_id; ?></p>
<p>
	<strong>Memo:</strong>
	<?php echo $project->memo; ?></p>


<?php echo Html::anchor('projects/edit/'.$project->id, '編集'); ?> |
<?php echo Html::anchor('projects', '戻る'); ?>