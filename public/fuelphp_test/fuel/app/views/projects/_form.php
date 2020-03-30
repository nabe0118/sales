<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('プロジェクト名', 'project_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('project_name', Input::post('project_name', isset($project) ? $project->project_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'プロジェクト名')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('クライアントID', 'client_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('client_id', Input::post('client_id', isset($project) ? $project->client_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'クライアントID')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('使用技術ID', 'technology_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('technology_id', Input::post('technology_id', isset($project) ? $project->technology_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'T使用技術ID')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('種別ID', 'development_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('development_id', Input::post('development_id', isset($project) ? $project->development_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'種別ID')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('開始日', 'start_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('start_date', Input::post('start_date', isset($project) ? $project->start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'開始日')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('納期', 'delivery_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('delivery_date', Input::post('delivery_date', isset($project) ? $project->delivery_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'納期')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('金額', 'price', array('class'=>'control-label')); ?>

				<?php echo Form::input('price', Input::post('price', isset($project) ? $project->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'金額')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('金額区分', 'price_section', array('class'=>'control-label')); ?>

				<?php echo Form::input('price_section', Input::post('price_section', isset($project) ? $project->price_section : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'金額区分')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('注文', 'order_expectation', array('class'=>'control-label')); ?>

				<?php echo Form::input('order_expectation', Input::post('order_expectation', isset($project) ? $project->order_expectation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'注文')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('ステータス', 'order_status', array('class'=>'control-label')); ?>

				<?php echo Form::input('order_status', Input::post('order_status', isset($project) ? $project->order_status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ステータス')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('PM', 'project_manager', array('class'=>'control-label')); ?>

				<?php echo Form::input('project_manager', Input::post('project_manager', isset($project) ? $project->project_manager : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'PM')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('社員ID', 'employee_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('employee_id', Input::post('employee_id', isset($project) ? $project->employee_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'社員ID')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Memo', 'memo', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('memo', Input::post('memo', isset($project) ? $project->memo : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Memo')); ?>

		</div>
		<div class="form-group">

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>