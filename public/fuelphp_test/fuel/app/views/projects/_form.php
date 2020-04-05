<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<a>登録日：<?php echo date("Y/m/d"); ?></a>

		<div class="form-group">
			<?php echo Form::label('プロジェクト名', 'project_name', array('class'=>'control-label')); ?>
			<?php echo Form::input('project_name', Input::post('project_name', isset($project) ? $project->project_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'○○ホーム')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('クライアント', 'client_id', array('class'=>'control-label')); ?>
			<?php /*  echo Form::input('client_id', Input::post('client_id', isset($project) ? $project->client_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Client id')); */?>


		<?php echo Form::select('client_id', 0, $client_data
		);
		?>

		</div>

		<div class="form-group">
			<?php echo Form::label('PM', 'employee_id', array('class'=>'control-label')); ?>
			<?php echo Form::input('employee_id', Input::post('employee_id', isset($project) ? $project->employee_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Employee id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('開始', 'start_date', array('class'=>'control-label')); ?>
			<?php echo Form::input('start_date', Input::post('start_date', isset($project) ? $project->start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Start date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('納期', 'delivery_date', array('class'=>'control-label')); ?>
			<?php echo Form::input('delivery_date', Input::post('delivery_date', isset($project) ? $project->delivery_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Delivery date')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('技術', 'technology', array('class'=>'control-label')); ?>
			<?php echo Form::input('technology', Input::post('technology', isset($project) ? $project->technology : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'PHP')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('種別', 'development', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('development',1,Input::post('development') == '1', array('id' => 'form_development_1')) ?>
			<?php echo Form::label('フルスクラッチ', 'development_1') ?><br>

			<?php echo Form::radio('development',2,Input::post('development') != '1', array('id' => 'form_development_2')) ?>
			<?php echo Form::label('カスタマイズ', 'development_1') ?><br>

			<?php echo Form::radio('development',3,Input::post('development') != '1', array('id' => 'form_development_3')) ?>
			<?php echo Form::label('パッケージ', 'development_1') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('区分', 'price_section', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('price_section',1,Input::post('price_section') == '1', array('id' => 'form_price_section_1')) ?>
			<?php echo Form::label('請負', 'price_section_1') ?><br>

			<?php echo Form::radio('price_section',2,Input::post('price_section') != '1', array('id' => 'form_price_section_2')) ?>
			<?php echo Form::label('保守', 'price_section_2') ?><br>

			<?php echo Form::radio('price_section',3,Input::post('price_section') != '1', array('id' => 'form_price_section_3')) ?>
			<?php echo Form::label('社内保持', 'price_section_3') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('確度', 'order_expectation', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('order_expectation',1,Input::post('order_expectation') == '1', array('id' => 'form_order_expectation_1')) ?>
			<?php echo Form::label('請負', 'order_expectation_1') ?><br>

			<?php echo Form::radio('order_expectation',2,Input::post('order_expectation') != '1', array('id' => 'form_order_expectation_2')) ?>
			<?php echo Form::label('保守', 'order_expectation_2') ?><br>

			<?php echo Form::radio('order_expectation',3,Input::post('order_expectation') != '1', array('id' => 'form_order_expectation_3')) ?>
			<?php echo Form::label('社内保持', 'order_expectation_3') ?><br>

			<?php echo Form::radio('order_expectation',4,Input::post('order_expectation') != '1', array('id' => 'form_order_expectation_4')) ?>
			<?php echo Form::label('社内保持', 'order_expectation_4') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('ステータス', 'order_status', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('order_status',1,Input::post('order_status') == '1', array('id' => 'form_order_status_1')) ?>
			<?php echo Form::label('商談中', 'order_status_1') ?><br>

			<?php echo Form::radio('order_status',2,Input::post('order_status') != '1', array('id' => 'form_order_status_2')) ?>
			<?php echo Form::label('進行中', 'order_status_2') ?><br>

			<?php echo Form::radio('order_status',3,Input::post('order_status') != '1', array('id' => 'form_order_status_3')) ?>
			<?php echo Form::label('請求済', 'order_status_3') ?><br>

			<?php echo Form::radio('order_status',4,Input::post('order_status') != '1', array('id' => 'form_order_status_4')) ?>
			<?php echo Form::label('完了', 'order_status_4') ?><br>

			<?php echo Form::radio('order_status',5,Input::post('order_status') != '1', array('id' => 'form_order_status_5')) ?>
			<?php echo Form::label('失注', 'order_status_5') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('Memo', 'memo', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('memo', Input::post('memo', isset($project) ? $project->memo : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Memo')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('金額', 'price', array('class'=>'control-label')); ?>
			<?php echo Form::input('price', Input::post('price', isset($project) ? $project->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Price')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::checkbox('price_flag',1,Input::post('price_flag') == '1', array('id' => 'form_price_flag_1')) ?>
			<?php echo Form::label('確定', 'price_flag1') ?><br>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>	
		</div>
	</fieldset>
<?php echo Form::close(); ?>
