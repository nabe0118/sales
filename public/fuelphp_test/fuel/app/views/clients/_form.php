<?php echo Form::open(); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('クライアント名', 'client_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('client_name', Input::post('client_name', isset($client) ? $client->client_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'AAA社')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('フリガナ', 'client_kana', array('class'=>'control-label')); ?>

				<?php echo Form::input('client_kana', Input::post('client_kana', isset($client) ? $client->client_kana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'エーエーエーシャ')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('備考', 'client_remarks', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('client_remarks', Input::post('client_remarks', isset($client) ? $client->client_remarks : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'2019年1月『★★★AAA社』から社名変更')); ?>

		</div>
		<div class="form-group">
			<?php /*echo Form::label('Is deleted', 'is_deleted', array('class'=>'control-label')); ?>

				<?php echo Form::input('is_deleted', Input::post('is_deleted', isset($client) ? $client->is_deleted : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Is deleted')); */?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>