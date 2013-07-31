<?php
class UITile extends CWidget {
 
	public $tileClass = "double";
	public $color = "";
    public $link = "#";
	public $tiles= array();
	
    public function run() {
        $this->render('uiTile', array(	'defaultTileClass' => $this->tileClass, 
										'defaultColor' => $this->color,
										'defaultLink' => $this->link)
						);
    }
 
}
?>