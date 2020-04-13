<?php echo Asset::css('bootstrap.css'); ?>

<h2><span class='muted'>プロジェクト一覧</span></h2>
<br>

<?php echo Html::anchor('clients/index', 'クライアントマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('members/index', 'メンバーマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('#', 'システム設定',array('class' => 'btn btn-default')); ?><br><br>


<?php echo Form::open(array('action'=>null,'id'=>'refineDate')); ?>
		<fieldset>
		<div>
			<?php echo Form::label('開始日', 'refineStartDay'); ?>
			<?php //echo Form::date('refineStartDay', Input::post('refineStartDay'), array('placeholder'=>20200408)); ?>
			<?php echo Form::input('refineStartDay', Input::post('refineStartDay'), array('class'=>'from','type'=>'date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('納期日', 'refineEndDay'); ?>
			<?php // echo Form::date('refineEndDay', Input::post('refineEndDay'), array('placeholder'=>20200430)); ?>
			<?php echo Form::input('refineEndDay', Input::post('refineEndDay'), array('class'=>'to','type'=>'date')); ?>
		</div>

		<div class="form-group"></div>
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::button('sentBtn', '絞り込み', array('type'=>'button','id'=>'sentBtn','class' => 'btn btn-primary')); ?>	
		</div>
		</fieldset>
<?php echo Form::close(); ?>


<h3>確定額：<?php echo $totalPriceConfirm; ?>万円</h3>
<h3>予定額：<?php echo $totalPriceEstimate; ?>万円</h3>


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
			<th>予定(万)</th>
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
	<tbody id = refine-project>
<?php foreach ($projects as $item): ?>
		<tr>
			<td><?php echo Html::anchor('projects/edit/'.$item->id, $item->project_name, array('class' => 'btn btn-default btn-sm')); ?></td>
			<td><?php echo $client_data[$item->client_id]; ?></td>
			<td><?php echo $index_order_status[$item->order_status]; ?></td>
			<td><?php echo $item->technology; ?></td>
			<td><?php echo date('Y/m/d',strtotime($item->start_date));?></td>
			<td><?php echo date('Y/m/d',strtotime($item->delivery_date));?></td>
			<td><?php echo $item->price_flag? '---------' : $item->price; ?></td>
			<td><?php echo !$item->price_flag?  '---------' : $item->price; ?></td>
			<td><?php echo $index_order_expectation[$item->order_expectation]; ?></td>
			<td><?php echo $members_name[$item->employee_id]; ?></td>
			<td><?php echo $item->memo; ?></td>
			<!-- <td><?php /* echo $item->price_section; */?></td> -->
			<!-- <td><?php /*echo $item->development; */?></td> -->
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php /* echo Html::anchor('projects/view/'.$item->id, '<i class="icon-eye-open"></i> 詳細', array('class' => 'btn btn-default btn-sm')); */ ?>						
						<?php /* echo Html::anchor('projects/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); */ ?>						
						<?php /* echo Html::anchor('projects/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); */?>					
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>作成されたプロジェクトはありません。</p>

<?php endif; ?>
<p>
	<?php echo Html::anchor('projects/create', '新規作成', array('class' => 'btn btn-success')); ?>
</p>

<script >
'use strict';

(function($){
	$("#refineDate #sentBtn").on('click', function(){

	var request_url = '<?php echo Uri::create('apis/refineday') ?>',

	//meta[name="csrf-token"]要素にcontent属性を追加
	token       = $('meta[name="csrf-token"]').attr('content'),
	//.val()で#refineDate .from'のvalueの値を取得
	from        = $('#refineDate .from').val(),
	to          = $('#refineDate .to').val(),
	form        = new FormData();

	console.log(request_url);

	//formオブジェクトにform,toを追加
	form.append("from", from);      
	form.append("to", to);

	console.log(form);

	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': token }
	});

$.ajax({
	url : request_url,
	type : "PUT",
	data: form,
	dataType: "json",
	processData: false,
	success : function(data) {
		$('#refine-project').empty();
		$.each(data, function(index, value) {
			var hd = '<tr>';

			hd += '<td>'+value.project_name+'</td>'
			hd += '<td>'+value.client_name+'</td>'
			hd += '<td>'+value.order_status+'</td>'
			hd += '<td>'+value.technology+'</td>'
			hd += '<td>'+value.start_date+'</td>'
			hd += '<td>'+value.delivery_date+'</td>'
			hd += '<td>'+value.price_kari+'</td>'
			hd += '<td>'+value.price+'</td>'
			hd += '<td>'+value.order_expectation+'</td>'
			hd += '<td>'+value.members_name+'</td>'
			hd += '<td>'+value.memo+'</td>'
			hd += '</tr>';

			console.log(value.price_kari);

			$('#refine-project').append(hd);
		})
		console.log(data);

},
  //失敗した場合
	error : function(XMLHttpRequest, textStatus, errorThrown) {
		alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
	}
});
});


})(jQuery);

</script>