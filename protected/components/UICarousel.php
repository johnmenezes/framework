<?php
class UICarousel extends CWidget {
 
	public $id = "carousel";
	public $header = "";
	public $desc = "";
	public $height = 300;
	public $dataParamDuration = 500;
	public $dataParamEffect = "fade";
    public $slides= array();

    public function run() {
        $this->render('uiCarousel');
    }
 
}
?>