<h2><span class='muted'>プロジェクト一覧</span></h2>
<br>
<?php if ($projects): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>プロジェクト名</th>
			<th>クライアントID</th>
			<th>使用技術ID</th>
			<th>種別ID</th>
			<th>開始日</th>
			<th>納期</th>
			<th>金額</th>
			<th>金額区分</th>
			<th>注文</th>
			<th>ステータス</th>
			<th>PM</th>
			<th>社員ID</th>
			<th>Memo</th>
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($projects as $item): ?>		
		<tr>
			<td><?php echo $item->project_name; ?></td>
			<td><?php echo $item->client_id; ?></td>
			<td><?php echo $item->technology_id; ?></td>
			<td><?php echo $development[$item->development_id]; ?></td>
			<td><?php echo $item->start_date; ?></td>
			<td><?php echo $item->delivery_date; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $price_section[$item->price_section]; ?></td>
			<td><?php echo $order_expectation[$item->order_expectation]; ?></td>
			<td><?php echo $order_status[$item->order_status]; ?></td>
			<td><?php echo $item->project_manager; ?></td>
			<td><?php echo $item->employee_id; ?></td>
			<td><?php echo $item->memo; ?></td>
			<!-- <td>Is deleted</td> -->

			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('projects/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('projects/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('projects/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>プロジェクトがありません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('projects/create', '新規プロジェクト作成', array('class' => 'btn btn-success')); ?>

</p>
