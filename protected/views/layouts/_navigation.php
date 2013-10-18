<div class="page">
	<div class="nav-bar bg-color-greenDark">

		<div class="nav-bar-inner padding10">
			<span class="pull-menu"></span>

			<a href="index.php">
				<span class="element brand">
					<img class="place-left logoimage" src="images/logo32.png" />
					<?php echo Yii::t('strings',Yii::app()->name); ?>
				</span>
			</a>

			<?php $this->widget('application.components.UIMenu', array(
				  'menu' => $this->siteMenu,
				  'position' => 'right'
				)); ?>

			<div class="divider"></div>

		</div>

		<div class="nav-bar-inner padding10">
			<span class="pull-menu"></span>

			<?php $this->widget('application.components.UIMenu', array(
				  'menu' => $this->contentMenu,
				  'position' => 'right'
				)); ?>

			<div class="divider"></div>

		</div>
	</div>
</div>
