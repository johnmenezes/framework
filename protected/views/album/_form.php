<?php
/* @var $this AlbumController */
/* @var $model Album */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'album-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'album_cd'); ?>
		<?php echo $form->textField($model,'album_cd',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'album_cd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header_en'); ?>
		<?php echo $form->textField($model,'header_en',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'header_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_en'); ?>
		<?php echo $form->textArea($model, 'desc_en', array('rows'=>10,'cols'=>80)); ?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header_th'); ?>
		<?php echo $form->textField($model,'header_th',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'header_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_th'); ?>
		<?php echo $form->textArea($model, 'desc_th', array('rows'=>10,'cols'=>80)); ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->numberField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery'); ?>
		<?php echo $form->checkBox($model,'gallery'); ?>
		<?php echo $form->error($model,'gallery'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->