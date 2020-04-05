<h2><span class='muted'>プロジェクト新規作成</span></h2>
<br>

<? /* php echo render('projects/_form'); */?>
<?php echo View::render('projects/_form',$client_data); ?>


<p><?php echo Html::anchor('projects', 'Back'); ?></p>
<?php if(empty($client_data)):?>
<div>Data is not null</div>
<?php endif;?>>

<?php var_dump($client_data); ?>
