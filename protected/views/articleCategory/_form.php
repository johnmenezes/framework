<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_cd'); ?>
		<?php echo $form->textField($model,'category_cd',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'category_cd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_desc'); ?>
		<?php echo $form->textField($model,'category_desc',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'category_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->