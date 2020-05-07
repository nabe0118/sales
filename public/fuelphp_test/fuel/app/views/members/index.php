<?php echo Asset::css('bootstrap.css'); ?>

<h2><span class='muted'>メンバー一覧</span></h2>
<br>

<?php echo Html::anchor('projects/index', 'プロジェクト一覧',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('clients/index', 'クライアントマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('#', 'システム設定',array('class' => 'btn btn-default')); ?><br><br>

<div>
    <input type="checkbox" id="allMembers" name="allMember" value= 0>
    <label for="allMembers">退職者を表示</label>
</div>

<?php if ($members): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th id = 'employee_id' class = 'sorting_desc sorttable'>社員ID</th>
			<th>氏名</th>
			<th id = 'name_kana' class = 'sorting_desc sorttable'>フリガナ</th>
			<th>Email</th>
			<th>権限</th>
			<th>在籍</th>
		</tr>
	</thead>
	<tbody id = all-members>
<?php foreach ($members as $item): ?>		
		<tr>
			<td><?php echo $item->employee_id; ?></td>
			<td><?php echo $item->full_name; ?></td>
			<td><?php echo $item->name_kana; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $kenngen[$item->authority]; ?></td>
			<td><?php echo $zaiseki[$item->tenure_flag]; ?></td>
		</tr>
<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>メンバーが登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('members/create', '新規登録', array('class' => 'btn btn-success')); ?>

</p>

<script >
'use strict';




var execOderField = null;
var execOderBy = null;

function ajaxDoMember(order_by){
	var request_url = '<?php echo Uri::create('apis/allmembers') ?>';

	if ($("#allMembers").prop("checked") == true) {
			var checked = 1;
	}else{
			var checked = 0;
	}

	var cond = {'flag' : checked};


	var data = {
		cond : cond,
		order_by : order_by
	};

	$.ajax({
	url : request_url,
	type : "GET",
	data: data,
	dataType: "json",
	// processData: false,
	success : function(data) {
		$('#all-members').empty();
		$.each(data, function(index, value) {
			var hd = '<tr>';
			hd += '<td>'+value.employee_id+'</td>'
			hd += '<td>'+value.full_name+'</td>'
			hd += '<td>'+value.name_kana+'</td>'
			hd += '<td>'+value.email+'</td>'
			hd += '<td>'+value.authority+'</td>'
			hd += '<td>'+value.tenure_flag+'</td>'
			hd += '<td>'+'<a class=\"btn btn-default btn-sm\" href=\"/members/edit/'+value.id+'\">'+'詳細'+'</a>'+'</td>'
			hd += '</tr>';

			$('#all-members').append(hd);
		})
	},
  //失敗した場合
	error : function(XMLHttpRequest, textStatus, errorThrown) {
		alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
	}
});
}

(function($){
	$("#allMembers").on('change', function(){
		ajaxDoMember({});

	});

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

		ajaxDoMember({
			'field': execOderField,
			'order_by': execOderBy
		});
	});


})(jQuery);

</script>