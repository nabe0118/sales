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
			<th>社員ID</th>
			<th>氏名</th>
			<th>フリガナ</th>
			<th>Email</th>
			<th>権限</th>
			<th>在籍</th>
			<!-- <th>Password</th> -->
			<!-- <th>所属</th> -->
			<!-- <th>備考</th> -->
			<!-- <th>入社日</th> -->
			<!-- <th>Is deleted</th> -->
			<th>&nbsp;</th>
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
			<td><?php // echo $zaiseki[$item->tenure_flag]= '0' ? '退職' : $zaiseki[$item->tenure_flag]; ?></td>

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

<script >
'use strict';

(function($){
	$("#allMembers").on('change', function(){

	var request_url = '<?php echo Uri::create('apis/allmembers') ?>',

	//meta[name="csrf-token"]要素にcontent属性を追加
	token       = $('meta[name="csrf-token"]').attr('content');
	var data = '';


	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': token }
	});


$.ajax({
	url : request_url,
	type : "POST",
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