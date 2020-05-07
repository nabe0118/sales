<?php echo Form::open(); ?>

	<fieldset>

		<a>登録日：<?php echo date("Y/m/d"); ?></a>

		<div class="form-group">
			<?php echo Form::label('プロジェクト名', 'project_name', array('class'=>'control-label')); ?>
			<?php echo Form::input('project_name', Input::post('project_name', isset($project) ? $project->project_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'○○ホーム')); ?>
		</div>

		<div class="form-group">
			<?php echo Html::anchor('clients/index', 'クライアント'); ?>
			<?php  /* echo Form::label('クライアント', 'client_id', array('class'=>'control-label')); */ ?>
			<?php echo Form::select('client_id', null, $client_data);?>
		</div>

		<div class="form-group">
			<?php echo Html::anchor('members/index', 'PM'); ?>
			<?php /* echo Form::label('PM', 'employee_id', array('class'=>'control-label')); */ ?>
			<?php echo Form::select('employee_id', null, $members_name); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('開始', 'start_date', array('class'=>'control-label')); ?>
			<?php echo Form::input('start_date', Input::post('start_date', isset($project) ?  : ''), array('class' => 'col-md-4 form-control', 'type'=>'date','placeholder'=>$today)); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('納期', 'delivery_date', array('class'=>'control-label')); ?>
			<?php echo Form::input('delivery_date', Input::post('delivery_date', isset($project) ? $project->delivery_date : ''), array('class' => 'col-md-4 form-control', 'type'=>'date','placeholder'=>$lastDayOfMonth)); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('技術', 'technology', array('class'=>'control-label')); ?>
			<?php echo Form::input('technology', Input::post('technology', isset($project) ? $project->technology : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'PHP')); ?>
		</div>

		<div class="form-group">
		<?php echo Form::label('種別', 'development', array('class'=>'control-label')); ?><br>

		<?php // echo Form::radio('development',1,Input::post('development',isset($project) ? $project->development : '') == '1' or (Input::post('development') == '' and !isset($project)), array('id' => 'form_development_1')) ?>
		<?php // echo Form::label('フルスクラッチ', 'development_1') ?><br>

		<?php echo Form::radio('development',1,Input::post('development',isset($project) ? $project->development : '') == '1', array('id' => 'form_development_1')) ?>
		<?php echo Form::label('フルスクラッチ', 'development_1') ?><br>

		<?php echo Form::radio('development',2,Input::post('development',isset($project) ? $project->development : '') == '2', array('id' => 'form_development_2')) ?>
		<?php echo Form::label('カスタマイズ', 'development_1') ?><br>

		<?php echo Form::radio('development',3,Input::post('development',isset($project) ? $project->development : '') == '3', array('id' => 'form_development_3')) ?>
		<?php echo Form::label('パッケージ', 'development_1') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('区分', 'price_section', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('price_section',1,Input::post('price_section',isset($project) ? $project->price_section : '') == '1' or (Input::post('price_section') == '' and !isset($project)) , array('id' => 'order_expectation_1')) ?>
			<?php echo Form::label('請負', 'price_section_1') ?><br>

			<?php echo Form::radio('price_section',2,Input::post('price_section',isset($project) ? $project->price_section : '') == '2', array('id' => 'form_price_section_2')) ?>
			<?php echo Form::label('保守', 'price_section_2') ?><br>

			<?php echo Form::radio('price_section',3,Input::post('price_section',isset($project) ? $project->price_section : '') == '3', array('id' => 'form_price_section_3')) ?>
			<?php echo Form::label('社内持出', 'price_section_3') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('確度', 'order_expectation', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('order_expectation',1,Input::post('order_expectation',isset($project) ? $project->order_expectation : '') == '1' or (Input::post('order_expectation') == '' and !isset($project)) , array('id' => 'order_expectation_1')) ?>
			<?php echo Form::label('低', 'order_expectation_1') ?><br>

			<?php echo Form::radio('order_expectation',2,Input::post('order_expectation',isset($project) ? $project->order_expectation : '') == '2', array('id' => 'form_order_expectation_2')) ?>
			<?php echo Form::label('中', 'order_expectation_2') ?><br>

			<?php echo Form::radio('order_expectation',3,Input::post('order_expectation',isset($project) ? $project->order_expectation : '') == '3', array('id' => 'form_order_expectation_3')) ?>
			<?php echo Form::label('高', 'order_expectation_3') ?><br>

			<?php echo Form::radio('order_expectation',4,Input::post('order_expectation',isset($project) ? $project->order_expectation : '') == '4', array('id' => 'form_order_expectation_4')) ?>
			<?php echo Form::label('内示', 'order_expectation_4') ?><br>

			<?php echo Form::radio('order_expectation',5,Input::post('order_expectation',isset($project) ? $project->order_expectation : '') == '5', array('id' => 'form_order_expectation_5')) ?>
			<?php echo Form::label('注文有', 'order_expectation_5') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('ステータス', 'order_status', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('order_status',1,Input::post('order_status',isset($project) ? $project->order_status : '') == '1' or (Input::post('order_status') == '' and !isset($project)) , array('id' => 'order_status_1')) ?>
			<?php echo Form::label('商談中', 'order_status_1') ?><br>

			<?php echo Form::radio('order_status',2,Input::post('order_status',isset($project) ? $project->order_status : '') == '2', array('id' => 'form_order_status_2')) ?>
			<?php echo Form::label('受注', 'order_status_2') ?><br>

			<?php echo Form::radio('order_status',3,Input::post('order_status',isset($project) ? $project->order_status : '') =='3', array('id' => 'form_order_status_3')) ?>
			<?php echo Form::label('請求済', 'order_status_3') ?><br>

			<?php echo Form::radio('order_status',4,Input::post('order_status',isset($project) ? $project->order_status : '') == '4', array('id' => 'form_order_status_4')) ?>
			<?php echo Form::label('完了', 'order_status_4') ?><br>

			<?php echo Form::radio('order_status',5,Input::post('order_status',isset($project) ? $project->order_status : '') == '5', array('id' => 'form_order_status_5')) ?>
			<?php echo Form::label('失注', 'order_status_5') ?><br>
		</div>

		<div class="form-group">
			<?php echo Form::label('Memo', 'memo', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('memo', Input::post('memo', isset($project) ? $project->memo : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'今月中に受注できるか判断できます。')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('金額', 'price', array('class'=>'control-label')); ?>
			<?php echo Form::input('price', Input::post('price', isset($project) ? $project->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'500')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::checkbox('price_flag',1,Input::post('price_flag') == '1', array('id' => 'form_price_flag_1')) ?>
			<?php echo Form::label('確定', 'price_flag1') ?><br>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>	
		</div>
	</fieldset>
<?php echo Form::close(); ?>
