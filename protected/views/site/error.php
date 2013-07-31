<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::t('strings', Yii::app()->name) . ' - ' . Yii::t('strings', 'ERROR');
?>


<div class="page"> <!-- with-sidebar -->

	<div class="page-region">
		<div class="page-region-content">
			<h1> <?php echo Yii::t('strings', 'ERROR') ?> <?php echo $code; ?></h1>

			<div class="error">
			<?php echo CHtml::encode($message); ?>
			</div>
		</div>
	</div>
</div>
