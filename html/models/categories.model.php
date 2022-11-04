<?php


require_once "connection.php";

class CategoriesModel{

	/*=============================================
	CREATE CATEGORY
	=============================================*/

	public static function mdlAddCategory($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(prefix, model) VALUES (:prefix, :model)");

		$stmt -> bindParam(":prefix", $data["prefix"], PDO::PARAM_STR);
		$stmt -> bindParam(":model", $data["model"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 'ok';

		} else {

			return 'error';

		}
		
		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	SHOW CATEGORY 
	=============================================*/
	
	public static function mdlShowCategories($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		else{
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDIT CATEGORY
	=============================================*/

	public static function mdlEditCategory($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET prefix = :prefix, model = :model WHERE id = :id");

		$stmt -> bindParam(":prefix", $data["prefix"], PDO::PARAM_STR);
		$stmt -> bindParam(":model", $data["model"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/

	public static function mdlDeleteCategory($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}