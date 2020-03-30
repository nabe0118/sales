<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('氏名', 'full_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('full_name', Input::post('full_name', isset($employee) ? $employee->full_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'氏名')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('氏名(カタカナ)', 'name_kana', array('class'=>'control-label')); ?>

				<?php echo Form::input('name_kana', Input::post('name_kana', isset($employee) ? $employee->name_kana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'カタカナ')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($employee) ? $employee->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php /*echo Form::label('Affiliation', 'affiliation', array('class'=>'control-label')); */?>

			<?php /*echo Form::input('affiliation', Input::post('affiliation', isset($employee) ? $employee->affiliation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Affiliation')); */?>


			<?php echo Form::label('所属', 'affiliation', array('class'=>'control-label')); ?>

			<?php echo Form::input('affiliation', Input::post('affiliation', isset($employee) ? $employee->affiliation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'所属')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('在職区分', 'tenure_flag', array('class'=>'control-label')); ?>

				<?php echo Form::input('tenure_flag', Input::post('tenure_flag', isset($employee) ? $employee->tenure_flag : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'在職区分')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('備考', 'user_remarks', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('user_remarks', Input::post('user_remarks', isset($employee) ? $employee->user_remarks : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'備考')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('入社日', 'hire_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('hire_date', Input::post('hire_date', isset($employee) ? $employee->hire_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'入社日')); ?>

		</div>
		<!-- is deleted の表記 -->
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>