<h2><span class='muted'>社員一覧</span></h2>
<br>
<?php if ($employees): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>氏名</th>
			<th>カタカナ</th>
			<th>Email</th>
			<th>所属</th>
			<th>在職フラグ</th>
			<th>備考</th>
			<th>入社日</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($employees as $item): ?>		
		<tr>
			<td><?php echo $item->full_name; ?></td>
			<td><?php echo $item->name_kana; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $test[$item->affiliation]; ?></td>
			<td><?php echo $zaisyoku[$item->tenure_flag]; ?></td>
			<td><?php echo $item->user_remarks; ?></td>
			<td><?php echo $item->hire_date; ?></td>
			<!-- is deleted の表記 -->
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('employee/view/'.$item->id, '<i class="icon-eye-open"></i> 一覧', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('employee/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('employee/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>登録された社員はいません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('employee/create', '社員を追加する', array('class' => 'btn btn-success')); ?>

</p>
