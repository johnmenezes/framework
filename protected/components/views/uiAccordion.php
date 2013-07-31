<ul class="accordion" data-role="accordion">
	<?php foreach($this->accordions as $accordion) { ?>
		<li>
			<a href="#"> <?php echo $accordion['header'] ?> </a> 
			<div class="tile-content" >
				<h4> <?php echo $accordion['header'] ?> </h4>
				<?php echo $accordion['content'] ?>
			</div>

		</li>
	<?php }	?>
</ul>
