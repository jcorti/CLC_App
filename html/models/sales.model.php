<?php

require_once 'connection.php';


class ModelSales{
  /*=============================================
  SHOWING SALES
  =============================================*/

  static public function mdlShowSales($table, $item, $value){

    if($item != null){

      $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id ASC");

      $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetch();

    }else{

      $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

    }

    $stmt -> close();

    $stmt = null;

  }

  /*=============================================
  REGISTERING Loaner
  =============================================*/

  static public function mdlAddSale($table, $data){

    $stmt = Connection::connect()->prepare("INSERT INTO $table(old_serial, loaner_serial, description,s_user, c_user) VALUES (:old_serial, :loaner_serial, :description, :s_user, :c_user)");

    $stmt->bindParam(":old_serial", $data["old_serial"], PDO::PARAM_INT);
    $stmt->bindParam(":loaner_serial", $data["loaner_serial"], PDO::PARAM_INT);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_INT);
    $stmt->bindParam(":s_user", $data["s_user"], PDO::PARAM_STR);
    $stmt->bindParam(":c_user", $data["c_user"], PDO::PARAM_STR); 

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    
    }

    $stmt->close();
    $stmt = null;

  }

  /*=============================================
  EDIT SALE
  =============================================*/

  static public function mdlEditSale($table, $data){

    $stmt = Connection::connect()->prepare("UPDATE $table SET  idCustomer = :idCustomer, idSeller = :idSeller, products = :products, tax = :tax, netPrice = :netPrice, totalPrice= :totalPrice, paymentMethod = :paymentMethod WHERE code = :code");

    $stmt->bindParam(":code", $data["code"], PDO::PARAM_INT);
    $stmt->bindParam(":idCustomer", $data["idCustomer"], PDO::PARAM_INT);
    $stmt->bindParam(":idSeller", $data["idSeller"], PDO::PARAM_INT);
    $stmt->bindParam(":products", $data["products"], PDO::PARAM_STR);
    $stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
    $stmt->bindParam(":netPrice", $data["netPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":totalPrice", $data["totalPrice"], PDO::PARAM_STR);
    $stmt->bindParam(":paymentMethod", $data["paymentMethod"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    
    }

    $stmt->close();
    $stmt = null;

  }

  /*=============================================
  DELETE SALE
  =============================================*/

  static public function mdlDeleteSale($table, $data){

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