<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class' => 'control-label')); ?>

			<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'form-control', 'placeholder' => 'Title')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Slug', 'slug', array('class' => 'control-label')); ?>

			<?php echo Form::input('slug', Input::post('slug', isset($post) ? $post->slug : ''), array('class' => 'form-control', 'placeholder' => 'Slug')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Summary', 'summary', array('class' => 'control-label')); ?>

			<?php echo Form::textarea('summary', Input::post('summary', isset($post) ? $post->summary : ''), array('class' => 'form-control', 'rows' => 8, 'placeholder' => 'Summary')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Body', 'body', array('class' => 'control-label')); ?>

			<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'form-control', 'rows' => 8, 'placeholder' => 'Body')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_id', Input::post('user_id', isset($post) ? $post->user_id : ''), array('class' => 'form-control', 'placeholder' => 'User id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/posts/view/'.$post->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/posts', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/posts', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>