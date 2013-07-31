<?php
/* @var $this ArticleCategoryController */
/* @var $data ArticleCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_cd')); ?>:</b>
	<?php echo CHtml::encode($data->category_cd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_desc')); ?>:</b>
	<?php echo CHtml::encode($data->category_desc); ?>
	<br />


</div>