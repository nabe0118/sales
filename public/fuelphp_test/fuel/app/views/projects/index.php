<h2><span class='muted'>プロジェクト一覧</span></h2>
<br>
<?php if ($projects): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>プロジェクト名</th>
			<th>クライアント</th>
			<th>ステータス</th>
			<th>技術</th>
			<th>開始日</th>
			<th>納期</th>
			<th>金額(万)</th>
			<th>確度</th>
			<th>PM</th>
			<th>Memo</th>
			<!-- <th>金額区分</th> -->
			<!-- <th>種別</th> -->
			<!-- <th>金額確定フラグ</th> -->
			<!-- <th>User</th> -->
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($projects as $item): ?>		
		<tr>
			<td><?php echo $item->project_name; ?></td>
			<td><?php echo $client_data[$item->client_id]; ?></td>
			<td><?php echo $index_order_status[$item->order_status]; ?></td>
			<td><?php echo $item->technology; ?></td>
			<td><?php echo $item->start_date; ?></td>
			<td><?php echo $item->delivery_date; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $index_order_expectation[$item->order_expectation]; ?></td>
			<td><?php echo $item->employee_id; ?></td>
			<td><?php echo $item->memo; ?></td>
			<!-- <td><?php /* echo $item->price_section; */?></td> -->
			<!-- <td><?php /*echo $item->development; */?></td> -->
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('projects/view/'.$item->id, '<i class="icon-eye-open"></i> 詳細', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('projects/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('projects/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>作成されたプロジェクトはありません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('projects/create', '新規作成', array('class' => 'btn btn-success')); ?>

</p>

