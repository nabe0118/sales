<h2>プロジェクト詳細 <span class='muted'>#<?php echo $project->id; ?></span></h2>

<p>
	<strong>Project name:</strong>
	<?php echo $project->project_name; ?></p>
<p>
	<strong>Client id:</strong>
	<?php echo $project->client_id; ?></p>
<p>
	<strong>Technology:</strong>
	<?php echo $project->technology; ?></p>
<p>
	<strong>Development:</strong>
	<?php echo $project->development; ?></p>
<p>
	<strong>Start date:</strong>
	<?php echo $project->start_date; ?></p>
<p>
	<strong>Delivery date:</strong>
	<?php echo $project->delivery_date; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $project->price; ?></p>
<p>
	<strong>Price section:</strong>
	<?php echo $project->price_section; ?></p>
<p>
	<strong>Price flag:</strong>
	<?php echo $project->price_flag; ?></p>
<p>
	<strong>Order expectation:</strong>
	<?php echo $project->order_expectation; ?></p>
<p>
	<strong>Order status:</strong>
	<?php echo $project->order_status; ?></p>
<p>
	<strong>Employee id:</strong>
	<?php echo $project->employee_id; ?></p>
<p>
	<strong>User:</strong>
	<?php echo $project->user; ?></p>
<p>
	<strong>Memo:</strong>
	<?php echo $project->memo; ?></p>
<p>
	<strong>Is deleted:</strong>
	<?php echo $project->is_deleted; ?></p>

<?php echo Html::anchor('projects/edit/'.$project->id, 'Edit'); ?> |
<?php echo Html::anchor('projects', 'Back'); ?>