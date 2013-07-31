<div class="page">
	<div class="nav-bar bg-color-greenDark">
		<div class="nav-bar-inner padding10">
			<span class="pull-menu"></span>

			<a href="index.php">
				<span class="element brand">
					<img class="place-left" src="images/logo32.png" style="height: 20px"/>
					<?php echo Yii::t('strings',Yii::app()->name); ?>
				</span>
			</a>

			<div class="divider"></div>

			<?php $this->widget('application.components.UIMenu', array(
				  'menu' => $this->siteMenu,
				  'position' => 'right'
				)); ?>

		</div>

		<div class="nav-bar-inner padding10">
			<span class="pull-menu"></span>
			<div class="divider"></div>

			<?php $this->widget('application.components.UIMenu', array(
				  'menu' => $this->contentMenu,
				  'position' => 'left'
				)); ?>


		</div>
	</div>
</div>
