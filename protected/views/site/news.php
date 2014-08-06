<?php
/* @var $this SiteController */
$this->pageTitle=Yii::t('strings', Yii::app()->name) . ' - ' . Yii::t('strings', 'NEWSMEDIA');
?>

<div class="page"> <!-- with-sidebar -->

	<div class="page-region">
		<div class="page-region-content">
			<h1> <?php echo Yii::t('strings', 'NEWSMEDIA') ?> </h1>
            <div class="grid">
                <div class="row">
					<div class="span12">

						<?php $this->widget('application.components.UITile', array(
							'tileClass' => 'double',
							'color' => 'greenDark',
							'tiles' => $newsArticles							
						)); ?>


					</div>
				</div>
			</div>
		</div>

		<div class="grid">
			<p>
				<?php $this->widget('application.components.SocialShareWidget', array(
					'url' => 'www.watpomassage.com' . Yii::app()->request->requestUri,				//required
					'services' => array('facebook', 'twitter', 'google'),   //optional
					'htmlOptions' => array('class' => 'right'),				//optional
					'popup' => true,										//optional
					));
				?>
			</p>
		</div>

	</div>
</div>
