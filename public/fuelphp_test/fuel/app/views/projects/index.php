<?php echo Asset::css('modal.css'); ?>

<h2><span class='muted'>プロジェクト一覧</span></h2>
<br>

<?php echo Html::anchor('clients/index', 'クライアントマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('members/index', 'メンバーマスタ管理',array('class' => 'btn btn-default')); ?>

<?php echo Html::anchor('#', 'システム設定',array('class' => 'btn btn-default')); ?><br><br>

<div>
    <input type="checkbox" id="onlyDone" name="onlyDone" value= 1>
    <label for="onlyDone">完了のみを表示</label>
</div>


<?php echo Form::open(array('action'=>null,'id'=>'refineDate')); ?>
		<fieldset>
		<div>
			<h3>納期で絞込</h3>
			<?php echo Form::input('refineStartDay', Input::post('refineStartDay'), array('class'=>'from','type'=>'date')); ?>
			〜
			<?php echo Form::input('refineEndDay', Input::post('refineEndDay'), array('class'=>'to','type'=>'date')); ?>
			<?php echo Form::button('sentBtn', '絞り込み', array('type'=>'button','id'=>'sentBtn','class' => 'btn btn-primary')); ?>	
		</div>

		<div class="remodal" data-remodal-id="modalA" data-remodal-options="closeOnOutsideClick:false" data-classname="ajaxCondStatusOptions">
			<h3>ステータス選択</h3>
			<div id="modalACondBox">
				<?php // echo Form::checkbox('order_expectation', 'すべて', null, array('class' => 'ajaxCondOptions')); ?>
				<?php // echo Form::label('すべて', 'order_expectation_checkbox'); ?><br>

				<?php echo Form::checkbox('order_status', '商談中', true,array('class' => 'ajaxCondStatusOptions',"data-value"=>"1", "data-label"=>"商談中")); ?>
				<?php echo Form::label('商談中', 'order_status_checkbox2'); ?><br>

				<?php echo Form::checkbox('order_status', '受注', true, array('class' => 'ajaxCondStatusOptions',"data-value"=>"2", "data-label"=>"受注")); ?>
				<?php echo Form::label('受注', 'order_status_checkbox3'); ?><br>

				<?php echo Form::checkbox('order_status', '請求済', true, array('class' => 'ajaxCondStatusOptions',"data-value"=>"3", "data-label"=>"請求済")); ?>
				<?php echo Form::label('請求済', 'order_status_checkbox4'); ?><br>

				<?php echo Form::checkbox('order_status', '完了', true, array('class' => 'ajaxCondStatusOptions',"data-value"=>"4", "data-label"=>"完了")); ?>
				<?php echo Form::label('完了', 'order_status_checkbox5'); ?>

			</div>
				<button id="modalANg" data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
				<button id="modalAOk" data-remodal-action="confirm" class="remodal-confirm">OK</button>
		</div>
		<div class="remodal" data-remodal-id="modalB" data-remodal-options="closeOnOutsideClick:false" data-classname="ajaxCondExpectationOptions">
			<h3>確度選択</h3>
			<div id="modalBCondBox">
				<?php // echo Form::checkbox('name', 'すべて', null, array('class' => 'ajaxCondOptions',"data-value"=>"1", "data-label"=>"注文有")); ?>
				<?php // echo Form::label('すべて', 'order_status_checkbox'); ?><br>

				<?php echo Form::checkbox('order_expectation', '低', true, array('class' => 'ajaxCondExpectationOptions',"data-value"=>"1", "data-label"=>"低")); ?>
				<?php echo Form::label('低', 'order_expectation_checkbox2'); ?><br>

				<?php echo Form::checkbox('order_expectation', '中', true, array('class' => 'ajaxCondExpectationOptions',"data-value"=>"2", "data-label"=>"中")); ?>
				<?php echo Form::label('中', 'order_expectation_checkbox3'); ?><br>

				<?php echo Form::checkbox('order_expectation', '高', true, array('class' => 'ajaxCondExpectationOptions',"data-value"=>"3", "data-label"=>"高")); ?>
				<?php echo Form::label('高', 'order_expectation_checkbox4'); ?><br>

				<?php echo Form::checkbox('order_expectation', '内示', true, array('class' => 'ajaxCondExpectationOptions',"data-value"=>"4", "data-label"=>"内示")); ?>
				<?php echo Form::label('内示', 'order_expectation_checkbox5'); ?><br>

				<?php echo Form::checkbox('order_expectation', '注文有', true, array('class' => 'ajaxCondExpectationOptions',"data-value"=>"5", "data-label"=>"注文有")); ?>
				<?php echo Form::label('注文有', 'order_expectation_checkbox5'); ?>

			</div>
			<button id="modalBNg" data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			<button id="modalBOk" data-remodal-action="confirm" class="remodal-confirm">OK</button>
		</div>

		</fieldset>
<?php echo Form::close(); ?>


<h4 id =totalPriceConfirm>確定額：<?php echo number_format($totalPriceConfirm); ?>万円</h4>
<h4 id =totalPriceEstimate>予定額：<?php echo number_format($totalPriceEstimate); ?>万円</h4>

<div>検索条件</div>
<div>
	<span>ステータス:</span>
	<span id="condtextStatus">全件</span>
</div>
<div>
	<span>確度:</span>
	<span id="condtextExpectation">全件</span>
</div>

<?php if ($projects): ?>
<table id="projects-table" class="table table-striped">
	<thead>
		<tr>
			<th>プロジェクト名</th>
			<th>クライアント</th>
			<th><a data-remodal-target="modalA">ステータス</a></th>
			<th>属性</th>
			<th id = 'start_date' class = 'sorting_desc sorttable'>開始日</th>
			<th>納期</th>
			<th>予定(万)</th>
			<th>金額(万)</th>
			<th><a data-remodal-target="modalB">確度</a></th>
			<th>PM</th>
			<th>Memo</th>
		</tr>
	</thead>
	<tbody id = refine-project>
<?php foreach ($projects as $item): ?>
		<tr>
			<td><?php echo Html::anchor('projects/edit/'.$item->id, $item->project_name); ?></td>
			<td><?php echo $client_data[$item->client_id]; ?></td>
			<td><?php echo $index_order_status[$item->order_status]; ?></td>
			<td><?php echo $item->technology; ?></td>
			<td><?php echo date('Y/m/d',strtotime($item->start_date));?></td>
			<td><?php echo date('Y/m/d',strtotime($item->delivery_date));?></td>
			<td><?php echo $item->price_flag? '---------' : number_format($item->price); ?></td>
			<td><?php echo !$item->price_flag?  '---------' : number_format($item->price); ?></td>
			<td><?php echo $index_order_expectation[$item->order_expectation]; ?></td>
			<td><?php echo $members_name[$item->employee_id]; ?></td>
			<td><?php echo $item->memo; ?></td>
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
	$("#onlyDone").on('change', function(){
		$('input[type="checkbox"].ajaxCondStatusOptions')
			.each(function (i, e) {
				if($("#onlyDone").prop("checked") == true){
					if ($(e).data('value') == 4) {
						$(e).prop('checked',true);
					} else {
						$(e).prop('checked',false);
					}
				}else{
					$(e).prop('checked',true);
				}
				
			});
		ajaxDoProject({});
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

		ajaxDoProject({
			'field': execOderField,
			'order_by': execOderBy
		});
	});

	$("#refineDate #sentBtn").on('click', function(){
		ajaxDoProject({});
	});
	$('[data-remodal-id=modalA]').remodal();
	$('[data-remodal-id=modalB]').remodal();

	$(document).on('confirmation', '.remodal', function () {
		var modal = $(this);
		console.log( $('input[type="checkbox"].'+modal.data("classname")+':checked').length);
		if( $('input[type="checkbox"].'+modal.data("classname")+':checked').length > 0 ) {
			ajaxDoProject({});
		} else {
			$(this).stop();
			// alert('条件つけてください');
			return false;
		}		
	});

})(jQuery);

var execOderField = null;
var execOderBy = null;

function ajaxDoProject(order_by){
	var cond = {};
	var condtextStatus = '';
	var condtextExpectation = '';
	var request_url = '<?php echo Uri::create('apis/refineday') ?>';
	$('input[type="checkbox"].ajaxCondStatusOptions:checked')
                    .each(function (i, e) {
                        if (!cond[$(e).attr('name')]) {
                            cond[$(e).attr('name')] = [$(e).data('value')];
                        } else {
                            cond[$(e).attr('name')].push($(e).data('value'));
                        }
                        condtextStatus += "&nbsp;" + $(e).data('label');
                    });
					$('#condtextStatus').html(condtextStatus);


	$('input[type="checkbox"].ajaxCondExpectationOptions:checked')
                    .each(function (i, e) {
                        if (!cond[$(e).attr('name')]) {
                            cond[$(e).attr('name')] = [$(e).data('value')];
                        } else {
                            cond[$(e).attr('name')].push($(e).data('value'));
                        }
                        condtextExpectation += "&nbsp;" + $(e).data('label');
                    });
					$('#condtextExpectation').html(condtextExpectation);

	cond.from = $('#refineDate .from').val();
	cond.to = $('#refineDate .to').val();
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
		var priceConfirm = 0;
		var priceEstimate = 0;
		$('#refine-project').empty();
		$('#totalPriceConfirm').empty();
		$('#totalPriceEstimate').empty();
		$.each(data, function(index, value) {
			var hd = '<tr>';
			hd += '<td>'+'<a href=\"/projects/edit/'+value.id+'\">'+value.project_name+'</a>'+'</td>'
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

			$('#refine-project').append(hd);

			priceConfirm += parseInt(value.price);
			priceEstimate += parseInt(value.price_kari);
		});
		$('#totalPriceConfirm').append(priceConfirm);
		$('#totalPriceEstimate').append(priceEstimate);
	},
	//失敗した場合
	error : function(XMLHttpRequest, textStatus, errorThrown) {
		alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
	}
});
};
</script>