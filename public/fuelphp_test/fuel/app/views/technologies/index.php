<h2><span class='muted'>技術一覧</span></h2>
<br>
<?php if ($technologies): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>技術名</th>
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($technologies as $item): ?>		
		<tr>
			<td><?php echo $item->technology_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('technologies/view/'.$item->id, '<i class="icon-eye-open"></i> 一覧', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('technologies/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('technologies/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Technologies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('technologies/create', '使用技術を追加する', array('class' => 'btn btn-success')); ?>

</p>
