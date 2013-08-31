<?php if ( $this->header != "" ) { ?>
	<h2> <?php echo $this->header; ?> </h2>
<?php } ?>

<div	id="<?php echo $this->id ?>" 
		class="carousel" 
		style="height: <?php echo $this->height; ?>px;"
		data-role="carousel" 
		data-param-duration="<?php echo $this->dataParamDuration ?>"
		data-param-effect="<?php echo $this->dataParamEffect ?>"
	> 
	<div class="slides">

    <?php
		$i = 0;
		foreach($this->slides as $slide) { 
			$i++ ;
			$height = '100%';
			$width = '100%';

			if ( isset($slide['height']) && $slide['height'] != null && isset($slide['width']) && $slide['width'] != null)
			{
				$height = $this->height.'px';
				$width = ( $slide['width'] * $this->height / $slide['height'] ) . 'px';
			}
		?>
		<div class="slide image" id="slide<?php echo $i ?>">
			<img src="<?php echo $slide['img'] ?>" style="height: <?php echo $height ?> ; width: <?php echo $width ?> ;"/>
			<?php if ( isset ($slide['desc']) && $slide['desc'] != "" ) { ?>
			<div class="description">
				<?php echo $slide['desc'] ?>
			</div>
			<?php } ?>
		</div>
	<?php }	?>

	</div>
	<span class="control left fg-color-yellow"> &lt; </span>
	<span class="control right fg-color-yellow"> &gt; </span>

</div>

<?php if ( $this->desc != "" ) { ?>
	<?php echo $this->desc; ?>
<?php } ?>
