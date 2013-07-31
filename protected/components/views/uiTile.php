<?php 
	
	foreach($this->tiles as $tile) { 
	$tileClass = $defaultTileClass;
	$link = $defaultLink;
	$color = $defaultColor;

	if( isset($tile['tileClass']) )
	{
		$tileClass = $tile['tileClass'];
	}

	if( isset($tile['link']) )
	{
		$link = $tile['link'];
	}

	if( isset($tile['color']) )
	{
		$color = $tile['color'];
	}


?>
	<div class="tile <?php echo $tileClass; ?>">

		<div class="tile-content" >
			<?php if ( isset($tile['header']) ) { ?>
				<h3> <?php echo $tile['header'] ?> </h3>
			<?php } ?>

			<?php echo $tile['content'] ?>
		</div>
		
		<?php 
		?>

		<a href = "<?php echo $link; ?>">
		<div class="brand bg-color-<?php echo $color; ?>">
			<?php echo Yii::t('strings', 'MORE'); ?>
		</div>
		</a>

	</div>

<?php }	?>

