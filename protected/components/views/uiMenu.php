<ul class="menu <?php echo $this->position ?>">
    <?php 
    foreach($this->menu as $menu) {

        if(isset($menu['children'])) 
		{
		?>
			<li data-role="dropdown">
				<a href="#"> 
					<?php if ( isset($menu['image']) && $menu['image'] != '' ) { ?> 
						<img class="place-left menu-img" src="<?php echo $menu['image'] ?>"/> 
					<?php } ?>
					<?php echo $menu['desc'] ?> 
				</a>
				<ul class="dropdown-menu">

					<?php 
						foreach($menu['children'] as $childmenu) {
					?>

						<?php if( isset($childmenu['isSeparator']) && $childmenu['isSeparator'] == true) { ?>
							<li class="divider"></li>
						<?php } else { ?>
						<li> 
							<a href="<?php echo $childmenu['url'] ?>"> 
								<?php if ( isset($childmenu['image']) && $childmenu['image'] != '' ) { ?> 
									<img class="place-left menu-img" src="<?php echo $childmenu['image'] ?>"/> 
								<?php } ?>
								<?php echo $childmenu['desc'] ?>
							</a>
						</li>
						<?php } ?>

					<?php 
						}	
					?>
				</ul>
			</li>

		<?php
        } 
		else // if children are not set
		{
		?>
			<?php if( isset($menu['isSeparator']) && $menu['isSeparator'] == true) { ?>
				<li class="divider"></li>
			<?php } else { ?>
			<li> 
				<a href="<?php echo $menu['url'] ?>"> 
					<?php if ( isset($menu['image']) && $menu['image'] != '' ) { ?> 
						<img class="place-left menu-img" src="<?php echo $menu['image'] ?>"/> 
					<?php } ?>

					<?php echo $menu['desc'] ?>
				</a>
			</li>
			<?php } ?>
		<?php
        }
    }
    ?>
