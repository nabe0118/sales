<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('技術名', 'technology_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('technology_name', Input::post('technology_name', isset($technology) ? $technology->technology_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'技術名')); ?>

		</div>
		<div class="form-group">
			<?php /* echo Form::label('Is deleted', 'is_deleted', array('class'=>'control-label')); ?>

				<?php echo Form::input('is_deleted', Input::post('is_deleted', isset($technology) ? $technology->is_deleted : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Is deleted')); */?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>