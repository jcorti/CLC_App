<?php

require_once 'connection.php';


class ModelCheckout{
  /*=============================================
  SHOWING SALES
  =============================================*/

  static public function mdlShowCheckout($table, $item, $value){

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
    public static function mdlAddCheckout($table, $data){  
    $stmt = Connection::connect()->prepare("
      INSERT INTO $table(old_serial, loaner_serial, loaner_name, school, description, s_user, c_user, damage_type, has_ins,princ_auth, is_returned, cosmetic, occurrence) 
                 VALUES (:old_serial, :loaner_serial, :loaner_name, :school, :description, :s_user, :c_user, :damage_type,:has_ins,:princ_auth, :is_returned, :cosmetic, :occurrence)");

    $stmt->bindParam(":old_serial", $data["old_serial"], PDO::PARAM_STR);
    $stmt->bindParam(":loaner_serial", $data["loaner_serial"], PDO::PARAM_STR);
    $stmt->bindParam(":loaner_name", $data["loaner_name"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
    $stmt->bindParam(":school", $data["school"], PDO::PARAM_STR);
    $stmt->bindParam(":s_user", $data["s_user"], PDO::PARAM_STR);
    $stmt->bindParam(":c_user", $data["c_user"], PDO::PARAM_STR); 
    $stmt->bindParam(":damage_type", $data["damage_type"], PDO::PARAM_STR);  
    $stmt->bindParam(":has_ins", $data["has_ins"], PDO::PARAM_STR);  
    $stmt->bindParam(":is_returned", $data["is_returned"], PDO::PARAM_STR);  
    $stmt->bindParam(":princ_auth", $data["princ_auth"], PDO::PARAM_INT); 
    $stmt->bindParam(":cosmetic", $data["cosmetic"], PDO::PARAM_STR);   
    $stmt->bindParam(":occurrence", $data["occurrence"], PDO::PARAM_STR); 
 
 

    if ($stmt->execute()) {

      return 'ok';

    } else {

      return 'error';

    }
    
    $stmt -> close();

    $stmt = null;
  }

    /*=============================================
      UPDATE Loaner 
    =============================================*/

  public static function mdlUpdateLoaner($table, $item1, $value1, $item2, $value2){

    $stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");

    $stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
    $stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

    if ($stmt->execute()) {
      
      return 'ok';
    
    } else {

      return 'error';
    
    }
    
    $stmt -> close();

    $stmt = null;
  }

   /*=============================================
      UPDATE Loaner 
    =============================================*/

  public static function mdlUpdateReturn($table, $item1, $value1, $item2, $value2){

    $stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");

    $stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
    $stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

    if ($stmt->execute()) {
      
      return 'ok';
    
    } else {

      return 'error';
    
    }
    
    $stmt -> close();

    $stmt = null;
  }


      /*=============================================
  DATES RANGE
  =============================================*/ 

  static public function mdlLoanerDatesRange($table, $initialDate, $finalDate){

    if($initialDate == null){

      $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll(); 


    }else if($initialDate == $finalDate){

      $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence like '%$finalDate%'");

      $stmt -> bindParam(":occurrence", $finalDate, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetchAll();

    }else{

      $actualDate = new DateTime();
      $actualDate ->add(new DateInterval("P1D"));
      $actualDatePlusOne = $actualDate->format("Y-m-d");

      $finalDate2 = new DateTime($finalDate);
      $finalDate2 ->add(new DateInterval("P1D"));
      $finalDatePlusOne = $finalDate2->format("Y-m-d");

      if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDatePlusOne'");

      }else{


        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDate'");

      }
    
      $stmt -> execute();

      return $stmt -> fetchAll();

      }

    }
      /*=============================================
  DATES RANGE
  =============================================*/ 

  static public function mdlLoanerDatesRangeSchool($table, $initialDate, $finalDate){

    if($initialDate == null){

      $stmt = Connection::connect()->prepare("SELECT school, count(school) FROM `checkout` group by school;");

      $stmt -> execute();

      return $stmt -> fetchAll(); 


    }else if($initialDate == $finalDate){

      $stmt = Connection::connect()->prepare("SELECT school, count(school) FROM `checkout` group by school;");

      $stmt -> bindParam(":occurrence", $finalDate, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetchAll();

    }else{

      $actualDate = new DateTime();
      $actualDate ->add(new DateInterval("P1D"));
      $actualDatePlusOne = $actualDate->format("Y-m-d");

      $finalDate2 = new DateTime($finalDate);
      $finalDate2 ->add(new DateInterval("P1D"));
      $finalDatePlusOne = $finalDate2->format("Y-m-d");

      if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDatePlusOne'");

      }else{


        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDate'");

      }
    
      $stmt -> execute();

      return $stmt -> fetchAll();

      }

    }
      /*=============================================
  DATES RANGE
  =============================================*/ 

  static public function mdlLoanerDatesR($table, $initialDate, $finalDate){

    if($initialDate == null){

      $stmt = Connection::connect()->prepare("SELECT school, count(school) FROM `checkout` group by school;");

      $stmt -> execute();

      return $stmt -> fetchAll(); 


    }else if($initialDate == $finalDate){

      $stmt = Connection::connect()->prepare("SELECT school, count(school) FROM `checkout` group by school;");

      $stmt -> bindParam(":occurrence", $finalDate, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetchAll();

    }else{

      $actualDate = new DateTime();
      $actualDate ->add(new DateInterval("P1D"));
      $actualDatePlusOne = $actualDate->format("Y-m-d");

      $finalDate2 = new DateTime($finalDate);
      $finalDate2 ->add(new DateInterval("P1D"));
      $finalDatePlusOne = $finalDate2->format("Y-m-d");

      if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDatePlusOne'");

      }else{


        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE occurrence BETWEEN '$initialDate' AND '$finalDate'");

      }
    
      $stmt -> execute();

      return $stmt -> fetchAll();

      }

    }
    public static function mdlCount($table, $school, $month)
    { 
      if($school != null){
        $stmt = Connection::connect()->prepare("SELECT school,occurrence, count(school) FROM $table where school = '$school' && month(occurrence)=$month group by school;");

        $stmt -> execute();

        return $stmt -> fetchAll(); 
    }else{

    
        $stmt = Connection::connect()->prepare("SELECT school,occurrence, count(school) FROM $table where month(occurrence)=$month group by school;");

        $stmt -> execute();
        
        return $stmt -> fetchAll(); 
    }
  }

    


    public static function mdlDamageType($table, $school, $month)
    {
      if($school != null){
        $stmt = Connection::connect()->prepare("SELECT school,damage_type,occurrence FROM $table where school = '$school' AND month(occurrence)=$month");

        $stmt -> execute();

       return $stmt -> fetchAll(); 
    }else{

    
        $stmt = Connection::connect()->prepare("SELECT school,damage_type,occurrence FROM $table where month(occurrence)=$month");

        $stmt -> execute();
        
        return $stmt -> fetchAll(); 
    }
  }


    public static function mdlnumberOfcalls($school)
    {
      
      if($school != null){
        $stmt = Connection::connect()->prepare("SELECT s_user,school, repair_type, count(s_user) AS total_calls FROM checkout WHERE school = '$school' AND month(occurrence) BETWEEN 1 AND 12 GROUP BY s_user ORDER BY total_calls DESC LIMIT 4");

        $stmt -> execute();

       return $stmt -> fetchAll(); 
     }else{ 
        $stmt = Connection::connect()->prepare("SELECT s_user,school, repair_type, count(s_user) AS total_calls FROM checkout WHERE  month(occurrence) BETWEEN 1 AND 12 GROUP BY s_user ORDER BY total_calls DESC LIMIT 4");

        $stmt -> execute();
        
        return $stmt -> fetchAll(); 
    }
  }

    public static function mdlNumberOfcallsProblem($school, $suser)
    {
      
      if($school != null){
        $stmt = Connection::connect()->prepare("
        SELECT s_user, repair_type,school, count(repair_type) AS total_repair FROM checkout WHERE school = '$school' AND s_user='$suser' AND month(occurrence) BETWEEN 1 AND 12 GROUP BY repair_type ORDER BY total_repair");

        $stmt -> execute();

       return $stmt -> fetchAll(); 
     }else{ 
        $stmt = Connection::connect()->prepare("SELECT s_user, repair_type,school, count(repair_type) AS total_repair FROM checkout WHERE s_user='$suser' AND month(occurrence) BETWEEN 1 AND 12 GROUP BY repair_type ORDER BY total_repair");

        $stmt -> execute();
        
        return $stmt -> fetchAll(); 
    }
  }

  public static function mdlShowCBName($table)
  {

      $stmt = Connection::connect()->prepare("SELECT *  FROM safeware ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }
  public static function mdlShowIns($emailTaken)
  {

      $stmt = Connection::connect()->prepare("SELECT *  FROM safeware WHERE email = '$emailTaken' ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

  public static function mdlShowLoanerName($table)
  {

      $stmt = Connection::connect()->prepare("SELECT cb_name, loaner_serial, status, last_user,c_user FROM $table  ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

  public static function mdlSwapCBName($table)
  {

      $stmt = Connection::connect()->prepare("SELECT cb_name, loaner_serial, status, last_user FROM $table  ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }
  
  public static function mdlCheckout($school)
  {
    $table = "checkout";

      $answer = ModelCheckout::mdlCheckout($table, $school);

      return $answer;
  }

  public static function mdlShowCBAuth($table,$school)
  {

      $stmt = Connection::connect()->prepare("SELECT old_serial, s_user, princ_auth,description FROM $table WHERE school = '$school'  ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

    static public function mdlStudentIns($table){

    
      $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll(); 
  }
    public static function mdlShowCheckoutUser($table, $userS, $loanerS)
  {

      $stmt = Connection::connect()->prepare("SELECT old_serial, loaner_serial, s_user FROM $table WHERE loaner_serial ='$loanerS' and s_user ='$userS' ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

    public static function mdlCheckStudent($table,$userName)
  {

      $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE s_user ='$userName' ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

    public static function mdlCheckSerial($table,$loanerS)
  {

      $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE old_serial ='$loanerS' ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }

    static public function mdlStudentSingleIns($table, $student){

    
      $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE email = '$student' ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll(); 
  }

    public static function mdlShowRepair()
  {

      $stmt = Connection::connect()->prepare("SELECT * FROM tech_repair  ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

  }    

  public static function mdlAddRepair()
  {

    $stmt = Connection::connect()->prepare("
      INSERT INTO $table(student_last, student_first,school,emails,reason,due,letter, follow_up, payment_received,hardship,ticket,notes) 
      VALUES (:student_last, :student_first, :school, :emails, :reason, :due, :letter, :follow_up :payment_received, :hardship, :ticket, :notes)");

    $stmt->bindParam(":student_last", $data["student_last"], PDO::PARAM_STR);
    $stmt->bindParam(":student_first", $data["student_first"], PDO::PARAM_STR);
    $stmt->bindParam(":emails", $data["emails"], PDO::PARAM_STR);
    $stmt->bindParam(":school", $data["school"], PDO::PARAM_STR);
    $stmt->bindParam(":reason", $data["reason"], PDO::PARAM_STR);
    $stmt->bindParam(":due", $data["due"], PDO::PARAM_STR); 
    $stmt->bindParam(":letter", $data["letter"], PDO::PARAM_STR);  
    $stmt->bindParam(":follow_up", $data["follow_up"], PDO::PARAM_STR);  
    $stmt->bindParam(":payment_received", $data["payment_received"], PDO::PARAM_STR);  
    $stmt->bindParam(":hardship", $data["hardship"], PDO::PARAM_INT);  
    $stmt->bindParam(":ticket", $data["ticket"], PDO::PARAM_STR);  
    $stmt->bindParam(":notes", $data["notes"], PDO::PARAM_STR);  



    if ($stmt->execute()) {

      return 'ok';

    } else {

      return 'error';

    }
    
    $stmt -> close();

    $stmt = null;
  }
    public static function mdlTechInsert($table, $data)
  {

    $stmt = Connection::connect()->prepare("
      INSERT INTO $table(tech,bserial,description,occurrence) 
      VALUES (:tech, :bserial, :description,:occurrence)");

    $stmt->bindParam(":tech", $data["tech"], PDO::PARAM_STR);
    $stmt->bindParam(":bserial", $data["bserial"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR); 
    $stmt->bindParam(":occurrence", $data["occurrence"], PDO::PARAM_STR);  



    if ($stmt->execute()) {

      return 'ok';

    } else {

      return 'error';

    }
    
    $stmt -> close();

    $stmt = null;

  }

}
