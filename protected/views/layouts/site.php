<?php /* @var $this Controller */ ?>

	<?php $this->renderPartial('/layouts/_header') ?>

	<body class="metrouicss <?php echo Yii::t('strings', 'LANGUAGE'); ?>" >

	<?php $this->renderPartial('/layouts/_navigation') ?>

	<?php echo $content; ?>

	<?php $this->renderPartial('/layouts/_footer') ?>

    </body>
</html>