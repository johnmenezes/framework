<?php
/* @var $this SiteController */
$this->pageTitle=Yii::t('strings', Yii::app()->name) . ' - ' . $model['header_'.$this->lang];
?>

<div class="page"> <!-- with-sidebar -->

	<div class="page-region">
		<div class="page-region-content">
			<h1> 
				<?php echo $model['header_'.$this->lang] ?> 			
			</h1>
			<div class="justify">

				<?php echo $model['content_'.$this->lang] ?>

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
