<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('strings', Yii::app()->name) . ' - ' . Yii::t('strings', 'GALLERY');
?>
<div class="page" id="page-index">
    <div class="page-region">
        <div class="page-region-content">

		<h1> <?php echo Yii::t('strings', 'GALLERY') ?> </h1>
		
		<br/>

		<div class="grid">

			<div class="row">
				<?php foreach ($albums as $album) {?>

					<div class="span6">

							<?php $this->widget('application.components.UICarousel', array(
								'id' => $album['id'],
								'header' => $album['header'],
								'desc' => $album['desc'],
								'dataParamDuration' => '500',
								'slides' => $album['images']
								)
							); ?>

					</div>
				<?php } ?>
			</div>

		</div>

		<div class="grid">
			<p>
				<?php $this->widget('application.components.SocialShareWidget', array(
					'url' => Yii::app()->request->requestUri,				//required
					'services' => array('facebook', 'twitter', 'google'),   //optional
					'htmlOptions' => array('class' => 'right'),				//optional
					'popup' => true,										//optional
					));
				?>
			</p>
		</div>

	</div>
</div>
