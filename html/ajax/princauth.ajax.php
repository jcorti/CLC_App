<?php

require_once "../controllers/loaner.controller.php";
require_once "../models/loaner.model.php";

class AjaxPrinc{
/*=============================================
	ACTIVATE USER
	=============================================*/

	public $activateUser;
	public $activateId;	

	public function ajaxActivateCB(){

		$table = "checkout";
		$item1 = "princ_auth";
		$value1 = $this->activateUser;

		$item2 = "s_user";
		$value2 = $this->activateId;

		$answer = ModelCheckout::mdlUpdateLoaner($table, $item1, $value1, $item2, $value2);


	}
}
	if (isset($_POST["activateUser"])) {

	$activateUser = new AjaxPrinc();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> ajaxActivateCB();
}
