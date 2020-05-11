<h2><span class='muted'>メンバー詳細</span></h2>
<br>

<?php echo Form::open(); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('メンバー名', 'full_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('full_name', Input::post('full_name', isset($member) ? $member->full_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'渡邊直登')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('フリガナ', 'name_kana', array('class'=>'control-label')); ?>

				<?php echo Form::input('name_kana', Input::post('name_kana', isset($member) ? $member->name_kana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ワタナベナオト')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('メールアドレス', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($member) ? $member->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'watanabe.n@marietta.co.jp')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('パスワード', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($member) ? str_repeat("*",mb_strlen($member->name_kana,"UTF8")) : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'123456')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('社員番号', 'employee_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('employee_id', Input::post('employee_id', isset($member) ? $member->employee_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'000101')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('権限', 'authority', array('class'=>'control-label')); ?><br>

			<?php echo Form::radio('authority',1,Input::post('authority',isset($member) ? $member->authority : '') == '1' or (Input::post('authority') == '' and !isset($member)) , array('id' => 'form_authority_1')) ?>
			<?php //echo Form::radio('authority',1,Input::post('authority') == '1', array('id' => 'form_authority_1')) ?>
			<?php echo Form::label('管理', 'authority_1') ?><br>

			<?php echo Form::radio('authority',2,Input::post('authority',isset($member) ? $member->authority : '') == '2', array('id' => 'form_authority_2')) ?>
			<?php //echo Form::radio('authority',2,Input::post('authority') != '1', array('id' => 'form_authority_2')) ?>
			<?php echo Form::label('一般', 'authority_2') ?><br>

				<?php /* echo Form::input('authority', Input::post('authority', isset($member) ? $member->authority : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Authority')); */?>
		</div>
		<div class="form-group"></div>
			<?php //echo Form::checkbox('tenure_flag',2,Input::post('tenure_flag') == '2', array('id' => 'tenure_flag_1')) ?>
			<?php echo Form::checkbox('tenure_flag',2,Input::post('tenure_flag',isset($member) ? $member->tenure_flag : '') == '2' or (Input::post('tenure_flag') == '' and !isset($member)) , array('id' => 'form_authority_1')) ?>
			<?php echo Form::label('退職', 'tenure_flag1') ?><br>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>
<p>
	<?php echo Html::anchor('members', 'キャンセル'); ?>
</p>

