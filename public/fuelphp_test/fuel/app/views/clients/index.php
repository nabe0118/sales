<?php echo Asset::css('bootstrap.css'); ?>

<h2><span class='muted'>クライアント一覧</span></h2>
<br>

<?php echo Html::anchor('projects/index', 'プロジェクト一覧',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('members/index', 'メンバーマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('#', 'システム設定',array('class' => 'btn btn-default')); ?><br><br>


<?php if ($clients): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>クライアント名</th>
			<th id = 'client_kana' class = 'sorting_desc sorttable'>クライアント名(カナ)</th>
			<th>備考</th>
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody id = all-clients>
<?php foreach ($clients as $item): ?>		
		<tr>
			<td><?php echo $item->client_name; ?></td>
			<td><?php echo $item->client_kana; ?></td>
			<td><?php echo $item->client_remarks; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<!-- //詳細画面で編集できるようリンクを変更 -->
						<?/*php echo Html::anchor('clients/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); */?>						
						<?php echo Html::anchor('clients/edit/'.$item->id, '<i class="icon-eye-open"></i> 詳細', array('class' => 'btn btn-default btn-sm')); ?>
						<?php /* echo Html::anchor('clients/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); */?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>クライアントが登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('clients/create', 'クライアント新規追加', array('class' => 'btn btn-success')); ?>
</p>

<script >
'use strict';

var execOderField = null;
var execOderBy = null;

function ajaxDoClients(order_by){
	var request_url = '<?php echo Uri::create('apis/allclients') ?>';

	var data = {
		order_by : order_by
	};

	$.ajax({
	url : request_url,
	type : "GET",
	data: data,
	dataType: "json",
	// processData: false,
	success : function(data) {
		$('#all-clients').empty();
		$.each(data, function(index, value) {
			var hd = '<tr>';
			hd += '<td>'+value.client_name+'</td>'
			hd += '<td>'+value.client_kana+'</td>'
			hd += '<td>'+value.client_remarks+'</td>'
			hd += '<td>'+'<a class=\"btn btn-default btn-sm\" href=\"/clients/edit/'+value.id+'\">'+'詳細'+'</a>'+'</td>'
			hd += '</tr>';
			$('#all-clients').append(hd);
		})
	},
  //失敗した場合
	error : function(XMLHttpRequest, textStatus, errorThrown) {
		alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
	}
});
}

(function($){
	$(".sorttable").on('click',function(){
		var fieldText = $(this).attr('id');
		execOderField = fieldText;

		if(execOderField == fieldText && execOderBy == 'asc'){
			$(this).removeClass("sorting_asc").addClass("sorting_desc")
			execOderBy = 'desc';
		}else{
			$(this).removeClass("sorting_desc").addClass("sorting_asc")
			execOderBy = 'asc';
		}

		ajaxDoClients({
			'field': execOderField,
			'order_by': execOderBy
		});
	});
})(jQuery);

</script>
