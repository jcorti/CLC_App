<?php

 class ControllerCategories{

 	/*=============================================
	CREATE CATEGORY
	=============================================*/
	
	public static function ctrCreateCategory(){

		if(isset($_POST['newPrefix'])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["newPrefix"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["newModel"])){

				$table = 'categories';

				$data = array('prefix' => $_POST['newPrefix'],'model' => $_POST['newModel']);

				$answer = CategoriesModel::mdlAddCategory($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "Category has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "categories";

								}
							});
						
					</script>';
				}
				

			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "No special characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "categories";
								}
							});
						
				</script>';
				
			}
		}
	}

	/*=============================================
	SHOW CATEGORIES
	=============================================*/

	public static function ctrShowCategories($item, $value){

		$table = "categories";

		$answer = CategoriesModel::mdlShowCategories($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT CATEGORY
	=============================================*/

	public static function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "categories";

				$data = array("Category"=>$_POST["editCategory"],
							   "id"=>$_POST["idCategory"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);
				// var_dump($answer);

				if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Category has been successfully saved ",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "No special characters or blank fields",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/

	public static function ctrDeleteCategory(){

		if(isset($_GET["idCategory"])){

			$table ="categories";
			$data = $_GET["idCategory"];

			$answer = CategoriesModel::mdlDeleteCategory($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "The category has been successfully deleted",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';
			}
		
		}
		
	}

}