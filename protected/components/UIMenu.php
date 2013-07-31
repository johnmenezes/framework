<?php
class UIMenu extends CWidget {
 
    public $menu = array();
	public $position = "left";

    public function run() {
        $this->render('uiMenu');
    }
 
}
?>