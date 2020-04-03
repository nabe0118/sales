<h2><span class='muted'>メンバー一覧</span></h2>
<br>
<?php if ($members): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>社員ID</th>
			<th>氏名</th>
			<th>カタカナ</th>
			<th>Email</th>
			<th>Password</th>
			<th>権限</th>
			<!-- <th>所属</th> -->
			<!-- <th>在職フラグ</th> -->
			<!-- <th>備考</th> -->
			<!-- <th>入社日</th> -->
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($members as $item): ?>		
		<tr>
			<td><?php echo $item->employee_id; ?></td>
			<td><?php echo $item->full_name; ?></td>
			<td><?php echo $item->name_kana; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->password; ?></td>
			<td><?php echo $kenngen[$item->authority]; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<!-- 詳細はレコード全体をリンクにする -->
						<!-- 削除は論理削除をするのでとりあえずコメントアウト -->
						<?php echo Html::anchor('members/edit/'.$item->id, '<i class="icon-wrench"></i> 詳細', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php /* echo Html::anchor('members/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('本当に削除しますか?')")); */?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>メンバーが登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('members/create', '新規登録', array('class' => 'btn btn-success')); ?>

</p>
