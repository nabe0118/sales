<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('メンバー名', 'full_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('full_name', Input::post('full_name', isset($member) ? $member->full_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'山田太郎')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('フリガナ', 'name_kana', array('class'=>'control-label')); ?>

				<?php echo Form::input('name_kana', Input::post('name_kana', isset($member) ? $member->name_kana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ヤマダタロウ')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('メールアドレス', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($member) ? $member->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'marietta@co.jp')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('パスワード', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($member) ? $member->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'123456')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('社員番号', 'employee_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('employee_id', Input::post('employee_id', isset($member) ? $member->employee_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'000001')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('権限', 'authority', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('authority',1,Input::post('authority') == '1', array('id' => 'form_authority_1')) ?>
			<?php echo Form::label('管理', 'authority_1') ?><br>

			<?php echo Form::radio('authority',2,Input::post('authority') != '0', array('id' => 'form_authority_2')) ?>
			<?php echo Form::label('一般', 'authority_2') ?><br>

				<?php /* echo Form::input('authority', Input::post('authority', isset($member) ? $member->authority : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Authority')); */?>

		</div>


		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>