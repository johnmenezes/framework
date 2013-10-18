<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::t('strings', Yii::app()->name) . ' - ' . Yii::t('strings', 'CONTACT');
?>

<div class="page" id="page-index">
    <div class="page-region">
        <div class="page-region-content">

			<h1> <?php echo Yii::t('strings', 'CONTACT') ?> </h1>

			<?php if(Yii::app()->user->hasFlash('contact')): ?>

			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('contact'); ?>
			</div>

			<?php else: ?>

			<h2> <?php echo Yii::t('strings', 'CONTACT_WATPOTITLE') ?> </h2>
			<p> <?php echo Yii::t('strings', 'CONTACT_WATPOADDRESS') ?> </p>
			<p> <?php echo Yii::t('strings', 'CONTACT_WATPOTEL') ?> </p>
			<p> <?php echo Yii::t('strings', 'CONTACT_WATPOEMAIL') ?> </p>
			
			<br>
			
			<p> <?php echo Yii::t('strings', 'CONTACT_INFO') ?> </p>

			<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'contact-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>

				<p class="note">Fields with <span class="required">*</span> are required.</p>

				<?php echo $form->errorSummary($model); ?>

				<div class="row">
					<?php echo $form->labelEx($model,'name'); ?>
					<div class="input-control text">
						<?php echo $form->textField($model,'name'); ?>
						<button class="btn-clear"></button>
					</div>
					
					<?php echo $form->error($model,'name'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<div class="input-control text">
						<?php echo $form->textField($model,'email'); ?>
						<button class="btn-clear"></button>
					</div>
					<?php echo $form->error($model,'email'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'telephone'); ?>
					<div class="input-control text">
						<?php echo $form->textField($model,'telephone'); ?>
						<button class="btn-clear"></button>
					</div>
					<?php echo $form->error($model,'telephone'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'subject'); ?>
					<div class="input-control text">
						<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
						<button class="btn-clear"></button>
					</div>
					<?php echo $form->error($model,'subject'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'body'); ?>
					<div class="input-control textarea">
						<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
					</div>
					<?php echo $form->error($model,'body'); ?>
				</div>

				<?php if(CCaptcha::checkRequirements()): ?>
				<div class="row">
					<?php echo $form->labelEx($model,'verifyCode'); ?>
					<div>
					<?php $this->widget('CCaptcha'); ?>
					<div class="input-control text">
						<?php echo $form->textField($model,'verifyCode'); ?>
						<button class="btn-clear"></button>
					</div>

					</div>
					<div class="hint">Please enter the letters as they are shown in the image above.
					<br/>Letters are not case-sensitive.</div>
					<?php echo $form->error($model,'verifyCode'); ?>
				</div>
				<?php endif; ?>

				<div class="row buttons">
					<?php echo CHtml::submitButton( Yii::t('strings', 'SUBMIT'), array('class' => 'bg-color-greenDark')); ?>
				</div>

			<?php $this->endWidget(); ?>

			</div><!-- form -->

			<?php endif; ?>

		</div>
	</div>
</div>
