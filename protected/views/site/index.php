<?php
/* @var $this SiteController */
$this->pageTitle=Yii::t('strings', Yii::app()->name);
?>

<div class="page" id="page-index">
    <div class="page-region">
        <div class="page-region-content">
            <div class="grid">
                <div class="row">
                    <div class="span12">
                        <div class="hero-unit">

							<?php $this->widget('application.components.UICarousel', array(
								'id' => $album['id'],
								'dataParamDuration' => '500',
								'slides' => $album['images']
								)
							); ?>


                        </div>
                    </div>
                </div>

				<!-- Main Article-->
				<?php 
	
					foreach($mainArticles as $mainArticle) { 
				?>
					<div class="row">
						<div class="span12">
							<h2> 
								<?php echo $mainArticle['header_'.$this->lang] ?> 			
							</h2>
							<div class="justify">

								<?php echo $mainArticle['content_'.$this->lang] ?>

							</div>

						</div>
					</div>
				<?php 
					} 
				?>
				<!-- Main Article-->
            </div>

            <div class="grid">
                <div class="row">
					<div class="span9">
						<h2> <?php echo Yii::t('strings', 'INTERESTINGARTICLES'); ?> </h2>

						<?php $this->widget('application.components.UITile', array(
							'tileClass' => 'double',
							'color' => 'greenDark',
							'tiles' => $interestingArticles							
						)); ?>


					</div>

                    <div class="span3">
						<h2> <?php echo Yii::t('strings', 'INTERESTINGLINKS'); ?> </h2>

						<?php $this->widget('application.components.UIAccordion', array(
							'accordions' => array(
								array(	'header' => 'Medicos Massage Product', 
										'content' => '<p><a href = "http://www.thaimedicos.com/"> Visit site </a></p>'),
								array(	'header' => 'Chetawan Retreat Resort', 
										'content' => '<p><a href = "http://www.chetawanretreatresort.com/"> Visit site </a></p>')
							)
						)); ?>

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
</div>
