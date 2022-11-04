<?php

class controllerProducts{
	
	public static function ctrShowProducts($item, $value){

		$table = "hs_loaners";

		$answer = productsModel::mdlShowProducts($table, $item, $value);

		return $answer;

	} 

		public static function ctrShowProductsToo($table, $item, $value){

	
		$answer = productsModel::mdlShowProducts($table, $item, $value);

		return $answer;

	} 

		/*=============================================
			CREATE PRODUCTS
		=============================================*/

	public static function ctrCreateProducts(){

		if(isset($_POST["newSerial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newSerial"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newcbName"])){

				$table = "hs_loaners";

				$data = array("cb_serial" => $_POST["newSerial"],
							   "cb_name" => $_POST["newcbName"]);

				$answer = productsModel::mdlAddSerial($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Loaner updated correctly",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "home";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Loaner not created,
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "home";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	EDIT PRODUCT
	=============================================*/

	static public function ctrEditProduct(){

		if(isset($_POST["editDescription"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editSellingPrice"])){

		   		/*=============================================
				VALIDATE IMAGE
				=============================================*/

			   	$route = $_POST["currentImage"];

			   	if(isset($_FILES["editImage"]["tmp_name"]) && !empty($_FILES["editImage"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					WE CREATE THE FOLDER WHERE WE WILL SAVE THE PRODUCT IMAGE
					=============================================*/

					$folder = "views/img/products/".$_POST["editCode"];

					/*=============================================
					WE ASK IF WE HAVE ANOTHER PICTURE IN THE DB
					=============================================*/

					if(!empty($_POST["currentImage"]) && $_POST["currentImage"] != "views/img/products/default/anonymous.png"){

						unlink($_POST["currentImage"]);

					}else{

						mkdir($folder, 0755);	
					
					}
					
					/*=============================================
					WE APPLY DEFAULT PHP FUNCTIONS ACCORDING TO THE IMAGE FORMAT
					=============================================*/

					if($_FILES["editImage"]["type"] == "image/jpeg"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["editImage"]["type"] == "image/png"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["editCategory"],
							   "code" => $_POST["editCode"],
							   "description" => $_POST["editDescription"],
							   "stock" => $_POST["editStock"],
							   "buyingPrice" => $_POST["editBuyingPrice"],
							   "sellingPrice" => $_POST["editSellingPrice"],
							   "image" => $route);

				$answer = productsModel::mdlEditProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "The product has been edited",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡The Product cannot be empty or have special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	DELETE PRODUCT
	=============================================*/
	static public function ctrDeleteProduct(){

		if(isset($_GET["idProduct"])){

			$table ="products";
			$datum = $_GET["idProduct"];

			if($_GET["image"] != "" && $_GET["image"] != "views/img/products/default/anonymous.png"){

				unlink($_GET["image"]);
				rmdir('views/img/products/'.$_GET["code"]);

			}

			$answer = productsModel::mdlDeleteProduct($table, $datum);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The Product has been successfully deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		
		
		}

	}

}