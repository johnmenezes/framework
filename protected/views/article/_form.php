<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'article_category_id'); ?>

		<?php echo $form->dropDownList($model,'article_category_id', CHtml::listData(ArticleCategory::model()->findAll(), 'id', 'category_desc'), array('empty'=>'')); ?>


		<?php echo $form->error($model,'article_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->numberField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header_en'); ?>
		<?php echo $form->textField($model,'header_en',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'header_en'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'content_en'); ?>
		<?php echo $form->textArea($model, 'content_en', array('rows'=>10,'cols'=>80)); ?>
		<?php echo $form->error($model,'content_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header_th'); ?>
		<?php echo $form->textField($model,'header_th',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'header_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content_th'); ?>
		<?php echo $form->textArea($model, 'content_th', array('rows'=>10,'cols'=>80)); ?>
		<?php echo $form->error($model,'content_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interest'); ?>
		<?php echo $form->checkBox($model,'interest'); ?>
		<?php echo $form->error($model,'interest'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->